<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use JMS\Serializer\Annotation as Serializer;
use Nette\Utils\Strings;

/**
 * Class DataMessageStatus
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmStatus")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class DataMessageStatus
{

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusCode")
     */
    protected $code;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusMessage")
     */
    protected $message;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusRefNumber")
     */
    protected $refNumber;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return DataMessageStatus
     */
    public function setCode(string $code): DataMessageStatus
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return DataMessageStatus
     */
    public function setMessage(string $message): DataMessageStatus
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefNumber(): string
    {
        return $this->refNumber;
    }

    /**
     * @param string $refNumber
     * @return DataMessageStatus
     */
    public function setRefNumber(string $refNumber): DataMessageStatus
    {
        $this->refNumber = $refNumber;
        return $this;
    }


    public function isOk()
    {
        return Strings::startsWith($this->getCode(), '00');
    }
}