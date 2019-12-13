<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Recipient
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmRecipient")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class Recipient
{

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbIDRecipient")
     */
    protected $dataBoxId;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmRecipientOrgUnit")
     * @Serializer\SkipWhenEmpty
     */
    protected $orgUnit;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SkipWhenEmpty
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmRecipientOrgUnitNum")
     */
    protected $orgUnitNum;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmToHands")
     */
    protected $toHand;

    /**
     * @return string
     */
    public function getDataBoxId(): string
    {
        return $this->dataBoxId;
    }

    /**
     * @param string $dataBoxId
     * @return Recipient
     */
    public function setDataBoxId(string $dataBoxId): Recipient
    {
        $this->dataBoxId = $dataBoxId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOrgUnit(): ?string
    {
        return $this->orgUnit;
    }

    /**
     * @param null|string $orgUnit
     * @return Recipient
     */
    public function setOrgUnit(?string $orgUnit): Recipient
    {
        $this->orgUnit = $orgUnit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrgUnitNum(): ?int
    {
        return $this->orgUnitNum;
    }

    /**
     * @param int|null $orgUnitNum
     * @return Recipient
     */
    public function setOrgUnitNum(?int $orgUnitNum): Recipient
    {
        $this->orgUnitNum = $orgUnitNum;
        return $this;
    }

    /**
     * @return string
     */
    public function getToHand(): string
    {
        return $this->toHand;
    }

    /**
     * @param string $toHand
     * @return Recipient
     */
    public function setToHand(string $toHand): Recipient
    {
        $this->toHand = $toHand;
        return $this;
    }


}