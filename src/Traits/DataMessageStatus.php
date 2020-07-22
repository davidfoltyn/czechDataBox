<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Traits;

use HelpPC\CzechDataBox\IResponseStatus;
use JMS\Serializer\Annotation as Serializer;

trait DataMessageStatus
{

	/**
	 * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataMessageStatus")
	 * @Serializer\SerializedName("p:dmStatus")
	 * @Serializer\XmlElement(cdata=false)
	 */
	protected IResponseStatus $status;

	public function getStatus(): IResponseStatus
	{
		return $this->status;
	}

	public function setStatus(IResponseStatus $status): self
	{
		$this->status = $status;
		return $this;
	}

}
