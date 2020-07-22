<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use HelpPC\CzechDataBox\Enum\LoginTypeEnum;
use HelpPC\CzechDataBox\Enum\PortalTypeEnum;

class Account
{

	private ?string $loginName = null;

	private ?string $dataBoxId = null;

	private ?string $password = null;

	private LoginTypeEnum $loginType;

	private PortalTypeEnum $portalType;

	private ?string $certPublicFileName = null;

	private ?string $certPrivateFileName = null;

	private ?string $passPhrase = null;

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

	public function getLoginType(): LoginTypeEnum
	{
		return $this->loginType;
	}

	public function setLoginType(LoginTypeEnum $loginType): Account
	{
		$this->loginType = $loginType;
		return $this;
	}

	public function getPortalType(): PortalTypeEnum
	{
		return $this->portalType;
	}

	public function setPortalType(PortalTypeEnum $portalType): Account
	{
		$this->portalType = $portalType;
		return $this;
	}

	public function getCertPublicFileName(): ?string
	{
		return $this->certPublicFileName;
	}

	public function getCertPrivateFileName(): ?string
	{
		return $this->certPrivateFileName;
	}

	public function setCertPublicFileName(string $certPublicFileName): Account
	{
		$this->certPublicFileName = $certPublicFileName;
		return $this;
	}

	public function setCertPrivateFileName(string $certPrivateFileName): Account
	{
		$this->certPrivateFileName = $certPrivateFileName;
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

	public function getDataBoxId(): ?string
	{
		return $this->dataBoxId;
	}

	public function setDataBoxId(?string $dataBoxId): Account
	{
		$this->dataBoxId = $dataBoxId;
		return $this;
	}

}
