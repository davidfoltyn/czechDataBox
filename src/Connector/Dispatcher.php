<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Connector;


class Dispatcher extends \GuzzleHttp\Client
{
    public function __construct(Account $account, $proxyHost = null, $proxyPort = null, $proxyLogin = null, $proxyPassword = null)
    {
        $curl = [];
        $config['curl'] =& $curl;
        $curl[CURLOPT_POST] = true;
        $curl[CURLOPT_RETURNTRANSFER] = true;
        $curl[CURLOPT_FAILONERROR] = false;
        $curl[CURLOPT_FOLLOWLOCATION] = true;
        $curl[CURLINFO_HEADER_OUT] = true;
        $curl[CURLOPT_UNRESTRICTED_AUTH] = false;
        $curl[CURLOPT_NOBODY] = false;
        if ($account->getLogintype() != Account::LOGIN_CERT) {
            $curl[CURLOPT_USERPWD] = $account->getLoginname() . ":" . $account->getPassword();
        }

        //todo otestovat prihlasovani pomoci certifikatu
        if ($account->getLoginType() != Account::LOGIN_NAME_PASSWORD) {
            $curl[CURLOPT_SSLCERT] = $account->getCertfilename();
            $curl[CURLOPT_SSLCERTPASSWD] = $account->getPassphrase();
        }

        $caFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'CAfile.crt';
        $curl[CURLOPT_SSL_VERIFYPEER] = false;

        if (is_file($caFile)) {//todo nejaky problem s certifikatem, mozna problem s CA. 1.zari 2018 byla odstavka kvuli zmene CA
            $curl[CURLOPT_SSL_VERIFYPEER] = true;
            $curl[CURLOPT_SSL_VERIFYHOST] = 2;
            $curl[CURLOPT_CAINFO] = $caFile;
            $curl[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;
            if (PHP_MAJOR_VERSION >= 7 && PHP_MINOR_VERSION >= 2) {
                $curl[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1;
            }
            $curl[CURLOPT_SSL_CIPHER_LIST] = 'ALL!EXPORT!EXPORT40!EXPORT56!aNULL!LOW!RC4';
        }

        if (isset($proxyHost)) {
            $curl[CURLOPT_PROXY] = 'http://' . $proxyHost . ':' . $proxyPort;
            $curl[CURLOPT_HTTPPROXYTUNNEL] = true;
            if ($proxyLogin != null || $proxyPassword != null) {
                $curl[CURLOPT_PROXYUSERPWD] = $proxyLogin . ':' . $proxyPassword;
            }
        }
        parent::__construct($config);
    }

}