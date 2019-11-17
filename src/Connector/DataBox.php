<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Response;

class DataBox extends Connector
{

    public function GetOwnerInfoFromLogin(Account $account): Response\GetOwnerInfoFromLogin
    {
        return $this->send($account, self::ACCESSWS, (new Request\GetOwnerInfoFromLogin()), Response\GetOwnerInfoFromLogin::class);
    }

    public function ChangeISDSPassword(Account $account, Request\ChangeISDSPassword $input): Response\ChangeISDSPassword
    {
        return $this->send($account, self::ACCESSWS, $input, Response\ChangeISDSPassword::class);
    }

    public function GetPasswordExpirationInfo(Account $account): Response\GetPasswordInfo
    {
        return $this->send($account, self::ACCESSWS, (new Request\GetPasswordInfo), Response\GetPasswordInfo::class);
    }

}