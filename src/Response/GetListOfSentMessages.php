<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\MessageRecord;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetListOfSentMessages
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetListOfSentMessagesResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetListOfSentMessages extends IResponse
{

	use DataMessageStatus;

	/**
	 * @var Collection<int, MessageRecord>
	 * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\MessageRecord>")
	 * @Serializer\XmlList(entry="dmRecord", inline=false, namespace="http://isds.czechpoint.cz/v20")
	 * @Serializer\SerializedName("dmRecords")
	 * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
	 */
	protected Collection $records;

	public function __construct()
	{
		$this->records = new ArrayCollection();
	}

	/**
	 * @return Collection<int, MessageRecord>
	 */
	public function getRecord(): Collection
	{
		return $this->records;
	}

}
