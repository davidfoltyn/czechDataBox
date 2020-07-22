<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use GuzzleHttp\Client;

class Dispatcher extends Client
{

	public function __construct(?string $proxyHost = null, ?int $proxyPort = null, ?string $proxyLogin = null, ?string $proxyPassword = null)
	{
		$config = [];
		$curl = [];
		$config['curl'] =& $curl;
		$curl[CURLOPT_POST] = true;
		$curl[CURLOPT_RETURNTRANSFER] = true;
		$curl[CURLOPT_FAILONERROR] = false;
		$curl[CURLOPT_FOLLOWLOCATION] = true;
		$curl[CURLINFO_HEADER_OUT] = true;
		$curl[CURLOPT_UNRESTRICTED_AUTH] = false;
		$curl[CURLOPT_NOBODY] = false;

		$caFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'CAfile.crt';

		$curl[CURLOPT_SSL_VERIFYPEER] = false;
		if (is_file($caFile)) {
			$curl[CURLOPT_SSL_VERIFYPEER] = true;
			$curl[CURLOPT_SSL_VERIFYHOST] = 0;
			$curl[CURLOPT_CAINFO] = $caFile;
			$curl[CURLOPT_CAPATH] = $caFile;
			$curl[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;
		}

		if (isset($proxyHost)) {
			$curl[CURLOPT_PROXY] = 'http://' . $proxyHost . ':' . $proxyPort;
			$curl[CURLOPT_HTTPPROXYTUNNEL] = true;
			if ($proxyLogin !== null || $proxyPassword !== null) {
				$curl[CURLOPT_PROXYUSERPWD] = $proxyLogin . ':' . $proxyPassword;
			}
		}
		parent::__construct($config);
	}

}
