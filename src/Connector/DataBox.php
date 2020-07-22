<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use HelpPC\CzechDataBox\Enum\ServiceTypeEnum;
use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Response;

class DataBox extends Connector
{

	public function getOwnerInfoFromLogin(Account $account): Response\GetOwnerInfoFromLogin
	{
		return $this->send($account, ServiceTypeEnum::ACCESS, (new Request\GetOwnerInfoFromLogin()), Response\GetOwnerInfoFromLogin::class);
	}

	public function changeIsdsPassword(Account $account, Request\ChangeISDSPassword $input): Response\ChangeISDSPassword
	{
		return $this->send($account, ServiceTypeEnum::ACCESS, $input, Response\ChangeISDSPassword::class);
	}

	public function getPasswordExpirationInfo(Account $account): Response\GetPasswordInfo
	{
		return $this->send($account, ServiceTypeEnum::ACCESS, (new Request\GetPasswordInfo()), Response\GetPasswordInfo::class);
	}

}
