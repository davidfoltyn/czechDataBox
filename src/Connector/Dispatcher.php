<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Connector;


class Dispatcher extends \GuzzleHttp\Client
{
    public function __construct(string $proxyHost = NULL, int $proxyPort = NULL, string $proxyLogin = NULL, string $proxyPassword = NULL)
    {
        $curl = [];
        $config['curl'] =& $curl;
        $curl[CURLOPT_POST] = TRUE;
        $curl[CURLOPT_RETURNTRANSFER] = TRUE;
        $curl[CURLOPT_FAILONERROR] = FALSE;
        $curl[CURLOPT_FOLLOWLOCATION] = TRUE;
        $curl[CURLINFO_HEADER_OUT] = TRUE;
        $curl[CURLOPT_UNRESTRICTED_AUTH] = FALSE;
        $curl[CURLOPT_NOBODY] = FALSE;


        $caFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'CAfile.crt';

        $curl[CURLOPT_SSL_VERIFYPEER] = FALSE;
        if (is_file($caFile)) {
            $curl[CURLOPT_SSL_VERIFYPEER] = TRUE;
            $curl[CURLOPT_SSL_VERIFYHOST] = 0;
            $curl[CURLOPT_CAINFO] = $caFile;
            $curl[CURLOPT_CAPATH] = $caFile;
            $curl[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2; //1.zari 2018 byla odstavka kvuli zmene TLS na verzi 1.2
            //$curl[CURLOPT_SSL_CIPHER_LIST] = 'ALL!EXPORT!EXPORT40!EXPORT56!aNULL!LOW!RC4';
        }

        if (isset($proxyHost)) {
            $curl[CURLOPT_PROXY] = 'http://' . $proxyHost . ':' . $proxyPort;
            $curl[CURLOPT_HTTPPROXYTUNNEL] = TRUE;
            if ($proxyLogin != NULL || $proxyPassword != NULL) {
                $curl[CURLOPT_PROXYUSERPWD] = $proxyLogin . ':' . $proxyPassword;
            }
        }
        parent::__construct($config);
    }

}