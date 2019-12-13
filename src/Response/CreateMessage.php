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
 * Class CreateMessage
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:CreateMultipleMessageResponse", namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessorOrder("custom",custom={"messageStatus","status"})
 */
class CreateMessage implements IResponse
{
    use DataMessageStatus;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\MessageStatus>")
     * @Serializer\XmlList(entry="dmSingleStatus", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmMultipleStatus")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $multipleStatus;

    /**
     * @return ArrayCollection
     */
    public function getMultipleStatus(): ArrayCollection
    {
        return $this->multipleStatus;
    }

    /**
     * @param ArrayCollection $multipleStatus
     * @return CreateMessage
     */
    public function setMultipleStatus(ArrayCollection $multipleStatus): CreateMessage
    {
        $this->multipleStatus = $multipleStatus;
        return $this;
    }


    /**
     * @param \HelpPC\CzechDataBox\Entity\DataMessageStatus $status
     * @return CreateMessage
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): CreateMessage
    {
        $this->status = $status;
        return $this;
    }


    public function __construct()
    {
        $this->multipleStatus = new ArrayCollection();
    }

    public function isOk()
    {
        return $this->getStatus()->isOk();
    }

}