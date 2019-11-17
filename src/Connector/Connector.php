<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Connector;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use HelpPC\CzechDataBox\Exception\ConnectionException;
use HelpPC\CzechDataBox\Exception\SystemExclusion;
use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\IResponse;
use JMS\Serializer\Serializer;
use Psr\Http\Message\ResponseInterface;

abstract class Connector
{
    /** @var \GuzzleHttp\Client */
    private $guzzleHttp;
    /** @var Serializer */
    private $serializer;

    protected const OPERATIONSWS = 0;
    protected const INFOWS = 1;
    protected const SEARCHWS = 2;
    protected const SUPPLEMENTARYWS = 3;
    protected const ACCESSWS = 5;
    private $connected = false;

    public function __construct(Serializer $serializer, \GuzzleHttp\Client $guzzleHttp)
    {
        $this->guzzleHttp = $guzzleHttp;
        $this->serializer = $serializer;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    private function getServiceURL(string $portalType, int $ServiceType, string $LoginType)
    {
        $res = "https://ws1";
        if ($LoginType > Account::LOGIN_NAME_PASSWORD) {
            $res .= 'c';
        }
        if ($portalType == Account::ENV_TEST) {
            $res .= '.czebox.cz/';
        } elseif ($portalType == Account::ENV_PROD) {
            $res .= '.mojedatovaschranka.cz/';
        }
        if ($LoginType == Account::LOGIN_CERT) {
            $res .= 'cert/';
        } elseif ($LoginType == Account::LOGIN_HOSTED_SPIS) {
            $res .= 'hspis';
        }
        $res .= 'DS/';

        if ($ServiceType >= self::SUPPLEMENTARYWS) {
            $res .= 'DsManage';
        } elseif ($ServiceType == self::OPERATIONSWS) {
            $res .= 'dz';
        } elseif ($ServiceType == self::INFOWS) {
            $res .= 'dx';
        } elseif ($ServiceType == self::SEARCHWS) {
            $res .= 'df';
        }
        return $res;
    }

    private function getXmlDocument(?string $xmlContent = null): \DOMDocument
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        if ($xmlContent !== null) {
            $document->loadXML($xmlContent);
            return $document;
        }
        $document->loadXML('<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Header/><SOAP-ENV:Body></SOAP-ENV:Body></SOAP-ENV:Envelope>');
        return $document;
    }

    private function getValueByXpath(\DOMDocument $document, string $xpath)
    {
        $domXpath = new \DOMXPath($document);
        $result = null;
        $res = $domXpath->evaluate($xpath);
        if ($res instanceof \DOMNodeList) {
            foreach ($res as $node) {
                if ($node instanceof \DOMElement || $node instanceof \DOMDocument) {
                    $nodeValue = null;
                    $children = $node->childNodes;
                    foreach ($children as $child) {
                        $nodeValue .= $document->saveXML($child);
                    }
                } else {
                    $nodeValue = $node->nodeValue;
                }
                $result .= $nodeValue;
            }
        }
        return $result;
    }


    /**
     * @param Account $account
     * @param int $operationType
     * @param IRequest $request
     * @param string $responseClass
     * @return array|\JMS\Serializer\scalar|mixed|object
     * @throws ConnectionException
     * @throws SystemExclusion
     */
    protected function send(Account $account, int $operationType, IRequest $request, string $responseClass)
    {
        $location = $this->getLocation($account, $operationType);

        if (!in_array(IResponse::class, class_implements($responseClass))) {
            throw new ConnectionException();
        }
        $request = $this->serializer->serialize($request, 'xml');
        $request = $this->getXmlDocument($request);


        $requestDocument = $this->getXmlDocument();
        $requestDocumentXpath = new \DOMXPath($requestDocument);

        $bodyNode = $requestDocumentXpath->evaluate('//' . $requestDocument->documentElement->prefix . ':Body');
        $new = $bodyNode[0]->ownerDocument->importNode($request->documentElement, true);
        if ($bodyNode[0]->nextSibling) {
            $bodyNode[0]->insertBefore($new, $bodyNode[0]->nextSibling);
        } else {
            $bodyNode[0]->appendChild($new);
        }

        $curl = [];
        if ($account->getLogintype() != Account::LOGIN_CERT) {
            $curl[CURLOPT_USERPWD] = $account->getLoginname() . ":" . $account->getPassword();
        }

        //todo otestovat prihlasovani pomoci certifikatu
        if ($account->getLoginType() != Account::LOGIN_NAME_PASSWORD) {
            $curl[CURLOPT_SSLCERT] = $account->getCertfilename();
            $curl[CURLOPT_SSLCERTPASSWD] = $account->getPassphrase();
        }
        $headers = [
            'Connection' => 'Keep-Alive',
            'Accept-Encoding' => 'gzip,deflate',
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction' => '""',
            // 'User-Agent' => 'HelpPC PHP Client'

        ];


        try {
            /** @var ResponseInterface $response */
            $response = $this->guzzleHttp->post($location, ['curl' => $curl, 'headers' => $headers, 'body' => $requestDocument->saveXml()]);
            $response = $response->getBody()->getContents();
            $soapResponse = $this->getXmlDocument($response);
            $response = $this->getValueByXpath($soapResponse, '//' . $soapResponse->documentElement->prefix . ':Body');
            $soapResponse = null;
            $dom = $this->getXmlDocument($response);
            $prefix = $dom->documentElement->prefix;
            if ($prefix !== 'p') {
                $dom->documentElement->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:p', 'http://isds.czechpoint.cz/v20');
                $response = $dom->saveXML();
                $regex[] = '/(<|<\/)' . $prefix . ':(\w*)(\s|>|\/>)/';
                $replace[] = '\1p:\2\3';
                $response = preg_replace($regex, $replace, $response);
            }

        } catch (ServerException $exception) {
            if ($exception->getCode() === 503) {
                throw new SystemExclusion($exception->getMessage(), $exception->getCode(), $exception);
            }
            throw $exception;
        } catch (\Exception $ex) {
            throw new ConnectionException($ex->getMessage(), $ex->getCode(), $ex);
        } catch (\Throwable $ex) {
            throw new ConnectionException($ex->getMessage(), $ex->getCode(), $ex);
        }
        return $this->serializer->deserialize($response, $responseClass, 'xml');
    }

    protected function getLocation(Account $account, $portalType)
    {
        return $this->getServiceURL($account->getPortalType(), $portalType, $account->getLoginType());
    }
}