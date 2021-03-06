<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\DataBoxId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CheckDataBox
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:CheckDataBox",namespace="http://isds.czechpoint.cz/v20")
 */
class CheckDataBox implements IRequest
{

	use DataBoxId;

	/**
	 * @Serializer\Type("booL")
	 * @Serializer\SerializedName("p:dbApproved")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SkipWhenEmpty()
	 */
	protected ?bool $approved = null;

	/**
	 * @Serializer\Type("string")
	 * @Serializer\SerializedName("p:dbExternRefNumber")
	 * @Serializer\XmlElement(cdata=false)
	 * @Serializer\SkipWhenEmpty()
	 */
	protected ?string $externalRefNumber = null;

	public function getApproved(): ?bool
	{
		return $this->approved;
	}

	public function setApproved(?bool $approved): CheckDataBox
	{
		$this->approved = $approved;
		return $this;
	}

	public function getExternalRefNumber(): ?string
	{
		return $this->externalRefNumber;
	}

	public function setExternalRefNumber(?string $externalRefNumber): CheckDataBox
	{
		$this->externalRefNumber = $externalRefNumber;
		return $this;
	}

}
