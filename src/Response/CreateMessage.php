<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use HelpPC\CzechDataBox\Utils\MessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CreateMessage
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:CreateMultipleMessageResponse", namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessorOrder("custom",custom={"messageStatus","status"})
 */
class CreateMessage extends IResponse
{

	use DataMessageStatus;

	/**
	 * @var Collection<int, MessageStatus>
	 * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\MessageStatus>")
	 * @Serializer\XmlList(entry="dmSingleStatus", inline=false, namespace="http://isds.czechpoint.cz/v20")
	 * @Serializer\SerializedName("dmMultipleStatus")
	 * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
	 */
	protected Collection $multipleStatus;

	/**
	 * @return Collection<int, MessageStatus>
	 */
	public function getMultipleStatus(): Collection
	{
		return $this->multipleStatus;
	}

	public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): CreateMessage
	{
		$this->status = $status;
		return $this;
	}

	public function __construct()
	{
		$this->multipleStatus = new ArrayCollection();
	}

	public function isOk(): bool
	{
		return $this->getStatus()->isOk();
	}

}
