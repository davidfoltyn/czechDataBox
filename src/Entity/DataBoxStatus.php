<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use JMS\Serializer\Annotation as Serializer;

/**
 * Class DataBoxStatus
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbStatus")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class DataBoxStatus
{

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbStatusCode")
     */
    protected $code;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbStatusMessage")
     */
    protected $message;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbStatusRefNumber")
     */
    protected $refNumber;

    public function isOk()
    {
        return $this->getCode() === '0000';
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return DataBoxStatus
     */
    public function setCode(string $code): DataBoxStatus
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
     * @return DataBoxStatus
     */
    public function setMessage(string $message): DataBoxStatus
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
     * @return DataBoxStatus
     */
    public function setRefNumber(string $refNumber): DataBoxStatus
    {
        $this->refNumber = $refNumber;
        return $this;
    }

}