<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\Entity\ReturnedMessageEnvelope;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageEnvelopeDownload
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:MessageEnvelopeDownloadResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class MessageEnvelopeDownload implements IResponse
{

    use DataMessageStatus;

    /**
     * @var ReturnedMessageEnvelope|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\ReturnedMessageEnvelope")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmReturnedMessageEnvelope")
     */
    protected $message;

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataMessageStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataMessageStatus $status
     * @return MessageEnvelopeDownload
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): MessageEnvelopeDownload
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return ReturnedMessageEnvelope|null
     */
    public function getMessage(): ?ReturnedMessageEnvelope
    {
        return $this->message;
    }

    /**
     * @param ReturnedMessageEnvelope|null $message
     * @return MessageEnvelopeDownload
     */
    public function setMessage(?ReturnedMessageEnvelope $message): MessageEnvelopeDownload
    {
        $this->message = $message;
        return $this;
    }


}