<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageStatus
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:dmSingleStatus")
 */
class MessageStatus
{

    /**
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataMessageStatus")
     * @Serializer\SerializedName("dmStatus")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected DataMessageStatus $status;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmID")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?string $dataMessageId;

    public function getStatus(): DataMessageStatus
    {
        return $this->status;
    }

    public function setStatus(DataMessageStatus $status): MessageStatus
    {
        $this->status = $status;
        return $this;
    }

    public function getDataMessageId(): ?string
    {
        return $this->dataMessageId;
    }

    public function setDataMessageId(?string $dataMessageId): MessageStatus
    {
        $this->dataMessageId = $dataMessageId;
        return $this;
    }

}