<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\Entity\ReturnedMessage;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageDownload
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:MessageDownloadResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class MessageDownload extends IResponse
{

	use DataMessageStatus;

	/**
	 * @Serializer\SkipWhenEmpty
	 * @Serializer\Type("HelpPC\CzechDataBox\Entity\ReturnedMessage")
	 * @Serializer\SerializedName("p:dmReturnedMessage")
	 * @Serializer\XmlElement(cdata=false)
	 */
	protected ?ReturnedMessage $returnedMessage;

	public function getReturnedMessage(): ?ReturnedMessage
	{
		return $this->returnedMessage;
	}

	public function setReturnedMessage(?ReturnedMessage $returnedMessage): MessageDownload
	{
		$this->returnedMessage = $returnedMessage;
		return $this;
	}

}
