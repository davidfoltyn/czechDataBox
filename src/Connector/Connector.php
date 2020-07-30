<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use DOMDocument;
use DOMElement;
use DOMNodeList;
use DOMXPath;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use HelpPC\CzechDataBox\Enum\LoginTypeEnum;
use HelpPC\CzechDataBox\Enum\PortalTypeEnum;
use HelpPC\CzechDataBox\Enum\ServiceTypeEnum;
use HelpPC\CzechDataBox\Exception\ConnectionException;
use HelpPC\CzechDataBox\Exception\SystemExclusion;
use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\IResponse;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

abstract class Connector
{

	private Client $guzzleHttp;

	private SerializerInterface $serializer;

	public function __construct(SerializerInterface $serializer, Client $guzzleHttp)
	{
		$this->guzzleHttp = $guzzleHttp;
		$this->serializer = $serializer;
	}

	private function getServiceDomain(PortalTypeEnum $portalType): string
	{
		if ($portalType->equalsValue(PortalTypeEnum::MOJEDATOVASCHRANKA)) {
			return 'mojedatovaschranka.cz';
		}
		return 'czebox.cz';
	}

	private function getServiceUrl(ServiceTypeEnum $serviceTypeEnum): ?string
	{
		if (in_array($serviceTypeEnum->getValue(), [ServiceTypeEnum::SUPPLEMENTARY, ServiceTypeEnum::ACCESS])) {
			return 'DsManage';
		}
		if ($serviceTypeEnum->equalsValue(ServiceTypeEnum::OPERATIONS)) {
			return 'dz';
		}
		if ($serviceTypeEnum->equalsValue(ServiceTypeEnum::INFO)) {
			return 'dx';
		}
		if ($serviceTypeEnum->equalsValue(ServiceTypeEnum::SEARCH)) {
			return 'df';
		}
		return null;
	}

	private function getServiceLocation(PortalTypeEnum $portalType, ServiceTypeEnum $ServiceType, LoginTypeEnum $LoginType): string
	{
		$res = 'https://ws1';
		if (!$LoginType->equalsValue(LoginTypeEnum::LOGIN_NAME_PASSWORD)) {
			$res .= 'c';
		}

		$res .= '.' . $this->getServiceDomain($portalType) . '/';

		switch ($LoginType->getValue()) {
			case LoginTypeEnum::LOGIN_CERT_LOGIN_NAME_PASSWORD:
				$res .= 'certds/';
				break;
			case LoginTypeEnum::LOGIN_SPIS_CERT:
				$res .= 'cert/';
				break;
			case LoginTypeEnum::LOGIN_HOSTED_SPIS:
				$res .= 'hspis/';
				break;
		}

		$res .= 'DS/' . $this->getServiceUrl($ServiceType);

		return $res;
	}

	private function getXmlDocument(?string $xmlContent = null): DOMDocument
	{
		$document = new DOMDocument('1.0', 'UTF-8');
		if ($xmlContent !== null) {
			$document->loadXML($xmlContent);
			return $document;
		}
		$document->loadXML('<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Header/><SOAP-ENV:Body></SOAP-ENV:Body></SOAP-ENV:Envelope>');
		return $document;
	}

	private function getValueByXpath(DOMDocument $document, string $xpath): ?string
	{
		$domXpath = new DOMXPath($document);
		$result = null;
		$res = $domXpath->evaluate($xpath);
		if ($res instanceof DOMNodeList) {
			foreach ($res as $node) {
				if ($node instanceof DOMElement || $node instanceof DOMDocument) {
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
	 * @template T of IResponse
	 * @param Account $account
	 * @param int $serviceType
	 * @param IRequest $request
	 * @param string $responseClass
	 * @return IResponse
	 * @phpstan-param class-string<T> $responseClass
	 * @phpstan-return T
	 * @throws ConnectionException
	 * @throws SystemExclusion
	 */
	protected function send(Account $account, int $serviceType, IRequest $request, string $responseClass): IResponse
	{
		$location = $this->getLocation($account, ServiceTypeEnum::get($serviceType));
		if (!is_subclass_of($responseClass, IResponse::class)) {
			throw new ConnectionException();
		}

		$request = $this->serializer->serialize($request, 'xml');
		$request = $this->getXmlDocument($request);

		$requestDocument = $this->getXmlDocument();
		$requestDocumentXpath = new DOMXPath($requestDocument);

		$bodyNode = $requestDocumentXpath->evaluate('//' . $requestDocument->documentElement->prefix . ':Body');
		$new = $bodyNode[0]->ownerDocument->importNode($request->documentElement, true);
		if ($bodyNode[0]->nextSibling) {
			$bodyNode[0]->insertBefore($new, $bodyNode[0]->nextSibling);
		} else {
			$bodyNode[0]->appendChild($new);
		}

		$requestOptions = [
			'curl' => [],
			'headers' => [
				'Connection' => 'Keep-Alive',
				'Accept-Encoding' => 'gzip,deflate',
				'Content-Type' => 'text/xml; charset=utf-8',
				'SOAPAction' => '""',
				// 'User-Agent' => 'HelpPC PHP Client'
			],
			'body' => $requestDocument->saveXml(),
		];
		switch ($account->getLoginType()->getValue()) {
			case LoginTypeEnum::LOGIN_HOSTED_SPIS:
				$requestOptions['curl'][CURLOPT_USERPWD] = $account->getDataBoxId();
				break;
			case LoginTypeEnum::LOGIN_NAME_PASSWORD:
			case LoginTypeEnum::LOGIN_CERT_LOGIN_NAME_PASSWORD:
				$requestOptions['curl'][CURLOPT_USERPWD] = $account->getLoginName() . ':' . $account->getPassword();
				break;
		}
		if ($account->usingCertificate()) {
			$publicCert = tmpfile();
			$privateKey = tmpfile();
			fwrite($publicCert, $account->getPublicKey());
			fwrite($privateKey, $account->getPrivateKey());
			$requestOptions['curl'][CURLOPT_SSLCERT] = stream_get_meta_data($publicCert)['uri'];
			$requestOptions['curl'][CURLOPT_SSLKEY] = stream_get_meta_data($privateKey)['uri'];
			$requestOptions['curl'][CURLOPT_SSLKEYPASSWD] = $account->getPrivateKeyPassPhrase();
		}

		try {
			/** @var ResponseInterface $response */
			$response = $this->guzzleHttp->post($location, $requestOptions);
			$response = $response->getBody()->getContents();
			$soapResponse = $this->getXmlDocument($response);
			$response = $this->getValueByXpath($soapResponse, '//' . $soapResponse->documentElement->prefix . ':Body');
			$soapResponse = null;
			$dom = $this->getXmlDocument($response);
			$prefix = $dom->documentElement->prefix;
			if ($prefix !== 'p') {
				$dom->documentElement->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:p', 'http://isds.czechpoint.cz/v20');
				/** @var string $response */
				$response = $dom->saveXML();
				$regex = ['/(<|<\/)' . $prefix . ':(\w*)(\s|>|\/>)/'];
				$replace = ['\1p:\2\3'];
				$response = preg_replace($regex, $replace, $response);
			}

		} catch (ServerException $exception) {
			if ($exception->getCode() === 503) {
				throw new SystemExclusion($exception->getMessage(), $exception->getCode(), $exception);
			}
			throw $exception;
		} catch (Exception $ex) {
			throw new ConnectionException($ex->getMessage(), $ex->getCode(), $ex);
		} catch (Throwable $ex) {
			throw new ConnectionException($ex->getMessage(), $ex->getCode(), $ex);
		} finally {
			if ($account->usingCertificate()) {
				fclose($publicCert);
				fclose($privateKey);
			}
		}
		return $this->serializer->deserialize($response, $responseClass, 'xml');
	}

	protected function getLocation(Account $account, ServiceTypeEnum $serviceType): string
	{
		return $this->getServiceLocation($account->getPortalType(), $serviceType, $account->getLoginType());
	}

}
