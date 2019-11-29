<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataMessageEnvelope
{
    use DataMessageEnvelopeSub;
    use DataMessageId;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbIDSender")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderID;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSender")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $sender;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSenderAddress")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderAddress;

    /**
     * @var int
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSenderType")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderType;


    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmRecipient")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipient;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmRecipientAddress")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientAddress;
    /**
     * @var bool|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:dmAmbiguousRecipient")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $ambiguousRecipient;

    /**
     * @return string
     */
    public function getSenderID(): string
    {
        return $this->senderID;
    }

    /**
     * @param string $senderID
     * @return self
     */
    public function setSenderID(string $senderID): self
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
     * @return self
     */
    public function setSender(string $sender): self
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
     * @return self
     */
    public function setSenderAddress(?string $senderAddress): self
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
     * @return self
     */
    public function setSenderType(int $senderType): self
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
     * @return self
     */
    public function setRecipient(string $recipient): self
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
     * @return self
     */
    public function setRecipientAddress(?string $recipientAddress): self
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
     * @return self
     */
    public function setAmbiguousRecipient(?bool $ambiguousRecipient): self
    {
        $this->ambiguousRecipient = $ambiguousRecipient;
        return $this;
    }

}