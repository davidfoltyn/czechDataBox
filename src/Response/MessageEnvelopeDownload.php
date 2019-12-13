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
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataMessageStatus>
 */
class MessageEnvelopeDownload extends IResponse
{

    use DataMessageStatus;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\ReturnedMessageEnvelope")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmReturnedMessageEnvelope")
     */
    protected ?ReturnedMessageEnvelope $message;

    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): MessageEnvelopeDownload
    {
        $this->status = $status;
        return $this;
    }

    public function getMessage(): ?ReturnedMessageEnvelope
    {
        return $this->message;
    }

    public function setMessage(?ReturnedMessageEnvelope $message): MessageEnvelopeDownload
    {
        $this->message = $message;
        return $this;
    }

}