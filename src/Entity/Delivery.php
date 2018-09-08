<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\Traits\QTimestamp;
use JMS\Serializer\Annotation as Serializer;

/**
 * todo order
 * Class Delivery
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:dmDelivery")
 */
class Delivery
{
    use QTimestamp;

    /**
     * @var MessageEnvelope
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\MessageEnvelope")
     * @Serializer\SerializedName("p:dmDm")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $dataMessage;
    /**
     * @var Hash
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\Hash")
     * @Serializer\SerializedName("p:dmHash")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $hash;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmDeliveryTime")
     */
    protected $deliveryTime;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmAcceptanceTime")
     */
    protected $acceptanceTime;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmMessageStatus")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $messageStatus;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\DataMessageEvent>")
     * @Serializer\XmlList(entry="dmEvent", inline=false)
     * @Serializer\SerializedName("p:dmEvents")
     */
    protected $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    /**
     * @return Hash
     */
    public function getHash(): Hash
    {
        return $this->hash;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeliveryTime(): ?\DateTime
    {
        return $this->deliveryTime;
    }

    /**
     * @return \DateTime|null
     */
    public function getAcceptanceTime(): ?\DateTime
    {
        return $this->acceptanceTime;
    }

    /**
     * @return int
     */
    public function getMessageStatus(): int
    {
        return $this->messageStatus;
    }

    /**
     * @return ArrayCollection
     */
    public function getEvents(): ArrayCollection
    {
        return $this->events;
    }

    /**
     * @return MessageEnvelope
     */
    public function getDataMessage(): MessageEnvelope
    {
        return $this->dataMessage;
    }

}