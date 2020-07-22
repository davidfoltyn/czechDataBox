<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\Entity\Hash;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class VerifyMessage
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:VerifyMessageResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class VerifyMessage extends IResponse
{

	use DataMessageStatus;

	/**
	 * @Serializer\Type("HelpPC\CzechDataBox\Entity\Hash")
	 * @Serializer\SerializedName("p:dmHash")
	 * @Serializer\XmlElement(cdata=false)
	 */
	protected Hash $hash;

	public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): VerifyMessage
	{
		$this->status = $status;
		return $this;
	}

	public function getHash(): Hash
	{
		return $this->hash;
	}

	public function setHash(Hash $hash): VerifyMessage
	{
		$this->hash = $hash;
		return $this;
	}

}
