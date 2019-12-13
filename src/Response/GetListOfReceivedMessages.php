<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetListOfReceivedMessages
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetListOfReceivedMessagesResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetListOfReceivedMessages implements IResponse
{
    use DataMessageStatus;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\MessageRecord>")
     * @Serializer\XmlList(entry="dmRecord", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmRecords")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $record;

    public function __construct()
    {
        $this->record = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getRecord(): ArrayCollection
    {
        return $this->record;
    }

}