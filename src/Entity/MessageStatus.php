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
     * @var \HelpPC\CzechDataBox\Entity\DataMessageStatus
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataMessageStatus")
     * @Serializer\SerializedName("dmStatus")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $status;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmID")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $dataMessageId;

    /**
     * @return DataMessageStatus
     */
    public function getStatus(): DataMessageStatus
    {
        return $this->status;
    }

    /**
     * @param DataMessageStatus $status
     * @return MessageStatus
     */
    public function setStatus(DataMessageStatus $status): MessageStatus
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDataMessageId(): ?string
    {
        return $this->dataMessageId;
    }

    /**
     * @param null|string $dataMessageId
     * @return MessageStatus
     */
    public function setDataMessageId(?string $dataMessageId): MessageStatus
    {
        $this->dataMessageId = $dataMessageId;
        return $this;
    }

}