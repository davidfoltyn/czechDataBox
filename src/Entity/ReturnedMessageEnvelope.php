<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\CzechDataBox\Traits\QTimestamp;
use JMS\Serializer\Annotation as Serializer;

/**
 * todo order
 * Class ReturnedMessage
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmReturnedMessageEnvelope")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class ReturnedMessageEnvelope
{
    use QTimestamp;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("dmType")
     * @Serializer\XmlAttribute()
     */
    protected $type;
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
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmDeliveryTime")
     */
    protected $deliveryTime;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
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
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmAttachmentSize")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $attachmentSize;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ReturnedMessageEnvelope
     */
    public function setType(string $type): ReturnedMessageEnvelope
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return MessageEnvelope
     */
    public function getDataMessage(): MessageEnvelope
    {
        return $this->dataMessage;
    }

    /**
     * @param MessageEnvelope $dataMessage
     * @return ReturnedMessageEnvelope
     */
    public function setDataMessage(MessageEnvelope $dataMessage): ReturnedMessageEnvelope
    {
        $this->dataMessage = $dataMessage;
        return $this;
    }

    /**
     * @return Hash
     */
    public function getHash(): Hash
    {
        return $this->hash;
    }

    /**
     * @param Hash $hash
     * @return ReturnedMessageEnvelope
     */
    public function setHash(Hash $hash): ReturnedMessageEnvelope
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDeliveryTime(): ?\DateTimeImmutable
    {
        return $this->deliveryTime;
    }

    /**
     * @param \DateTimeImmutable|null $deliveryTime
     * @return ReturnedMessageEnvelope
     */
    public function setDeliveryTime(?\DateTimeImmutable $deliveryTime): ReturnedMessageEnvelope
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getAcceptanceTime(): ?\DateTimeImmutable
    {
        return $this->acceptanceTime;
    }

    /**
     * @param \DateTimeImmutable|null $acceptanceTime
     * @return ReturnedMessageEnvelope
     */
    public function setAcceptanceTime(?\DateTimeImmutable $acceptanceTime): ReturnedMessageEnvelope
    {
        $this->acceptanceTime = $acceptanceTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageStatus(): int
    {
        return $this->messageStatus;
    }

    /**
     * @param int $messageStatus
     * @return ReturnedMessageEnvelope
     */
    public function setMessageStatus(int $messageStatus): ReturnedMessageEnvelope
    {
        $this->messageStatus = $messageStatus;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttachmentSize(): int
    {
        return $this->attachmentSize;
    }

    /**
     * @param int $attachmentSize
     * @return ReturnedMessageEnvelope
     */
    public function setAttachmentSize(int $attachmentSize): ReturnedMessageEnvelope
    {
        $this->attachmentSize = $attachmentSize;
        return $this;
    }


}