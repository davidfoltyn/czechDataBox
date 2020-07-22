<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Traits;

use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

trait Signature
{

	/**
	 * @Serializer\SkipWhenEmpty
	 * @Serializer\Type("base64File")
	 * @Serializer\SerializedName("p:dmSignature")
	 * @Serializer\XmlElement(cdata=false)
	 */
	protected ?SplFileInfo $signature = null;

	public function getSignature(): ?SplFileInfo
	{
		return $this->signature;
	}

	public function setSignature(SplFileInfo $signature): self
	{
		$this->signature = $signature;
		return $this;
	}

}
