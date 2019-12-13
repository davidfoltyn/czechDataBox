<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use JMS\Serializer\Annotation as Serializer;

/**
 * Class DataMessageStatus
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmStatus")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class DataMessageStatus
{

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusCode")
     */
    protected string $code;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusMessage")
     */
    protected string $message;
    /**
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusRefNumber")
     */
    protected ?string $refNumber = null;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): DataMessageStatus
    {
        $this->code = $code;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): DataMessageStatus
    {
        $this->message = $message;
        return $this;
    }

    public function getRefNumber(): ?string
    {
        return $this->refNumber;
    }

    public function setRefNumber(?string $refNumber): DataMessageStatus
    {
        $this->refNumber = $refNumber;
        return $this;
    }

    public function isOk(): bool
    {
        return substr($this->getCode(), 0, 2) === '00';
    }
}