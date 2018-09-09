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
    private static $guzzleHttp;
    /** @var Serializer */
    private $serializer;

    protected const OPERATIONSWS = 0;
    protected const INFOWS = 1;
    protected const SEARCHWS = 2;
    protected const SUPPLEMENTARYWS = 3;
    protected const ACCESSWS = 5;
    private $connected = false;


    private $locations = [];

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    private function getServiceURL($portaltype, $ServiceType, $LoginType)
    {
        if ($portaltype == Account::ENV_FAKE) {
            if ($ServiceType >= self::SUPPLEMENTARYWS) {
                return 'https://' . $portaltype . '/fakeDS.php';
            } elseif ($ServiceType == self::OPERATIONSWS) {
                return 'https://' . $portaltype . '/fakeDZ.php';
            } elseif ($ServiceType == self::INFOWS) {
                return 'https://' . $portaltype . '/fakeDX.php';
            } elseif ($ServiceType == self::SEARCHWS) {
                return 'https://' . $portaltype . '/fakeDF.php';
            }
            return 'https://' . $portaltype . '/fake.php';
        }
        $res = "https://ws1";
        if ($LoginType > Account::LOGIN_NAME_PASSWORD) {
            $res .= 'c';
        }
        if ($portaltype == Account::ENV_TEST) {
            $res .= '.czebox.cz/';
        } elseif ($portaltype == Account::ENV_PROD) {
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
     * @param string $location
     * @param IRequest $request
     * @param string $responseClass
     * @return array|\JMS\Serializer\scalar|mixed|object
     * @throws ConnectionException
     * @throws SystemExclusion
     */
    protected function send(string $location, IRequest $request, string $responseClass)
    {
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

        $headers = array(
            'Connection' => 'Keep-Alive',
            'Accept-Encoding' => 'gzip,deflate',
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction' => '""',
            // 'User-Agent' => 'HelpPC PHP Client'
        );
        try {
            /** @var ResponseInterface $response */
            $response = self::$guzzleHttp->post($location, ['headers' => $headers, 'body' => $requestDocument->saveXml()]);
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


    protected function getLocation($portalType)
    {
        return $this->locations[$portalType];
    }

    public function connect(Account $account, $proxyHost = null, $proxyPort = null, $proxyLogin = null, $proxyPassword = null)
    {
        foreach ([
                     self::OPERATIONSWS,
                     self::INFOWS,
                     self::SEARCHWS,
                     self::SUPPLEMENTARYWS,
                     self::ACCESSWS
                 ] as $type) {
            $this->locations[$type] = $this->getServiceURL($account->getPortalType(), $type, $account->getLoginType());
        }
        if (!self::$guzzleHttp instanceof Client) {
            self::$guzzleHttp = new Dispatcher($account, $proxyHost, $proxyPort, $proxyLogin, $proxyPassword);
        }
        $this->connected = true;
    }
}