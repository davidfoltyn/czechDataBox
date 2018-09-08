<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Response;

class DataBox extends Connector
{
    /**
     * @return Response\GetOwnerInfoFromLogin
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetOwnerInfoFromLogin(): Response\GetOwnerInfoFromLogin
    {
        return $this->send($this->getLocation(self::ACCESSWS), (new Request\GetOwnerInfoFromLogin()), Response\GetOwnerInfoFromLogin::class);
    }

    /**
     * @param Request\ChangeISDSPassword $input
     * @return Response\ChangeISDSPassword
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ChangeISDSPassword(Request\ChangeISDSPassword $input): Response\ChangeISDSPassword
    {
        return $this->send($this->getLocation(self::ACCESSWS), $input, Response\ChangeISDSPassword::class);
    }

    /**
     * @return Response\GetPasswordInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetPasswordExpirationInfo(): Response\GetPasswordInfo
    {
        return $this->send($this->getLocation(self::ACCESSWS), (new Request\GetPasswordInfo), Response\GetPasswordInfo::class);
    }

}