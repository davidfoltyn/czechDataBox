<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 06.01.2018
 * Time: 23:13
 */

namespace HelpPC\CzechDataBox\Connector;


use HelpPC\CzechDataBox\Exception\BadOptionException;

class Account
{
    private ?string $loginName = NULL;
    private ?string $password = NULL;
    private ?string $loginType = NULL;
    private ?string $portalType = NULL;
    private ?string $certFileName = NULL;
    private ?string $passPhrase = NULL;

    const LOGIN_NAME_PASSWORD = 'password';
    const LOGIN_CERT = 'cert';
    const LOGIN_HOSTED_SPIS = 'hosted';

    const ENV_PROD = 'mojedatovaschranka.cz';
    const ENV_TEST = 'czebox.cz';
    const ENV_FAKE = 'isds.helppc.cz';

    public function getLoginName(): ?string
    {
        return $this->loginName;
    }

    public function setLoginName(string $loginName): Account
    {
        $this->loginName = $loginName;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): Account
    {
        $this->password = $password;
        return $this;
    }

    public function getLoginType(): ?string
    {
        return $this->loginType;
    }

    public function setLoginType(string $loginType): Account
    {
        if (!in_array($loginType, [self::LOGIN_CERT, self::LOGIN_HOSTED_SPIS, self::LOGIN_NAME_PASSWORD])) {
            throw  new BadOptionException(sprintf('The value %s is not allowed. Use one of Account::LOGIN_CERT Account::LOGIN_HOSTED_SPIS Account::LOGIN_NAME_PASSWORD', $loginType));
        }
        $this->loginType = $loginType;
        return $this;
    }

    public function getPortalType(): ?string
    {
        return $this->portalType;
    }

    public function setPortalType(string $portalType): Account
    {
        if (!in_array($portalType, [self::ENV_PROD, self::ENV_TEST, self::ENV_FAKE])) {
            throw  new BadOptionException(sprintf('The value %s is not allowed. Use one of Account::ENV_PROD Account::ENV_TEST', $portalType));
        }
        $this->portalType = $portalType;
        return $this;
    }

    public function getCertFileName(): ?string
    {
        return $this->certFileName;
    }

    public function setCertFileName(string $certFileName): Account
    {
        $this->certFileName = $certFileName;
        return $this;
    }

    public function getPassPhrase(): ?string
    {
        return $this->passPhrase;
    }

    public function setPassPhrase(string $passPhrase): Account
    {
        $this->passPhrase = $passPhrase;
        return $this;
    }


}