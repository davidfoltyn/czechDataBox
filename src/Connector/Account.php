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
    private $loginName;
    private $password;
    private $loginType;
    private $portalType;
    private $certFileName;
    private $passPhrase;

    const LOGIN_NAME_PASSWORD = 'password';
    const LOGIN_CERT = 'cert';
    const LOGIN_HOSTED_SPIS = 'hosted';

    const ENV_PROD = 'mojedatovaschranka.cz';
    const ENV_TEST = 'czebox.cz';
    const ENV_FAKE = 'isds.helppc.cz';

    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @param mixed $loginName
     * @return Account
     */
    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoginType()
    {
        return $this->loginType;
    }

    /**
     * @param mixed $loginType
     * @return Account
     * @throws BadOptionException
     */
    public function setLoginType($loginType)
    {
        if (!in_array($loginType, [self::LOGIN_CERT, self::LOGIN_HOSTED_SPIS, self::LOGIN_NAME_PASSWORD])) {
            throw  new BadOptionException(sprintf('The value %s is not allowed. Use one of Account::LOGIN_CERT Account::LOGIN_HOSTED_SPIS Account::LOGIN_NAME_PASSWORD', $loginType));
        }
        $this->loginType = $loginType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPortalType()
    {
        return $this->portalType;
    }

    /**
     * @param mixed $portalType
     * @return Account
     * @throws BadOptionException
     */
    public function setPortalType($portalType)
    {
        if (!in_array($portalType, [self::ENV_PROD, self::ENV_TEST, self::ENV_FAKE])) {
            throw  new BadOptionException(sprintf('The value %s is not allowed. Use one of Account::ENV_PROD Account::ENV_TEST', $portalType));
        }
        $this->portalType = $portalType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCertFileName()
    {
        return $this->certFileName;
    }

    /**
     * @param mixed $certFileName
     * @return Account
     */
    public function setCertFileName($certFileName)
    {
        $this->certFileName = $certFileName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassPhrase()
    {
        return $this->passPhrase;
    }

    /**
     * @param mixed $passPhrase
     * @return Account
     */
    public function setPassPhrase($passPhrase)
    {
        $this->passPhrase = $passPhrase;
        return $this;
    }


}