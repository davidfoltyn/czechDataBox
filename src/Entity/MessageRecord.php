<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use HelpPC\CzechDataBox\Traits\DataMessageEnvelope;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageRecord
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:dmRecord")
 */
class MessageRecord
{

    use DataMessageEnvelope;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmOrdinal")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $ordinal;
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("dmType")
     * @Serializer\XmlAttribute()
     */
    protected $type;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:dmAllowSubstDelivery")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $allowSubstDelivery;

    /**
     * @return int|null
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param int|null $ordinal
     * @return MessageRecord
     */
    public function setOrdinal(?int $ordinal): MessageRecord
    {
        $this->ordinal = $ordinal;
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
     * @return MessageRecord
     */
    public function setMessageStatus(int $messageStatus): MessageRecord
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
     * @return MessageRecord
     */
    public function setAttachmentSize(int $attachmentSize): MessageRecord
    {
        $this->attachmentSize = $attachmentSize;
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
     * @return MessageRecord
     */
    public function setDeliveryTime(?\DateTimeImmutable $deliveryTime): MessageRecord
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
     * @return MessageRecord
     */
    public function setAcceptanceTime(?\DateTimeImmutable $acceptanceTime): MessageRecord
    {
        $this->acceptanceTime = $acceptanceTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MessageRecord
     */
    public function setType(string $type): MessageRecord
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowSubstDelivery(): ?bool
    {
        return $this->allowSubstDelivery;
    }

    /**
     * @param bool|null $allowSubstDelivery
     * @return MessageRecord
     */
    public function setAllowSubstDelivery(?bool $allowSubstDelivery): MessageRecord
    {
        $this->allowSubstDelivery = $allowSubstDelivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderID(): string
    {
        return $this->senderID;
    }

    /**
     * @param string $senderID
     * @return MessageRecord
     */
    public function setSenderID(string $senderID): MessageRecord
    {
        $this->senderID = $senderID;
        return $this;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     * @return MessageRecord
     */
    public function setSender(string $sender): MessageRecord
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderAddress(): ?string
    {
        return $this->senderAddress;
    }

    /**
     * @param null|string $senderAddress
     * @return MessageRecord
     */
    public function setSenderAddress(?string $senderAddress): MessageRecord
    {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    /**
     * @return int
     */
    public function getSenderType(): int
    {
        return $this->senderType;
    }

    /**
     * @param int $senderType
     * @return MessageRecord
     */
    public function setSenderType(int $senderType): MessageRecord
    {
        $this->senderType = $senderType;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     * @return MessageRecord
     */
    public function setRecipient(string $recipient): MessageRecord
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipientAddress(): ?string
    {
        return $this->recipientAddress;
    }

    /**
     * @param null|string $recipientAddress
     * @return MessageRecord
     */
    public function setRecipientAddress(?string $recipientAddress): MessageRecord
    {
        $this->recipientAddress = $recipientAddress;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAmbiguousRecipient(): ?bool
    {
        return $this->ambiguousRecipient;
    }

    /**
     * @param bool|null $ambiguousRecipient
     * @return MessageRecord
     */
    public function setAmbiguousRecipient(?bool $ambiguousRecipient): MessageRecord
    {
        $this->ambiguousRecipient = $ambiguousRecipient;
        return $this;
    }


}