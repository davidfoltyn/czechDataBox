<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataMessageEnvelopeSub
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSenderOrgUnit")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderOrgUnit;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmSenderOrgUnitNum")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderOrgUnitNum;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbIDRecipient")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientID;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmRecipientOrgUnit")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientOrgUnit;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmRecipientOrgUnitNum")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientOrgUnitNum;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmToHands")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $toHands;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmAnnotation")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $annotation;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmRecipientRefNumber")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientRefNumber;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSenderRefNumber")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderRefNumber;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmRecipientIdent")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipientIdent;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmSenderIdent")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $senderIdent;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:dmLegalTitleLaw")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $legalTitleLaw;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dmLegalTitleYear")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $legalTitleYear;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmLegalTitleSect")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $legalTitleSect;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmLegalTitlePar")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $legalTitlePar;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmLegalTitlePoint")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $legalTitlePoint;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:dmPersonalDelivery")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $personalDelivery;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:dmAllowSubstDelivery")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $allowSubstDelivery;

    /**
     * @return null|string
     */
    public function getSenderOrgUnit(): ?string
    {
        return $this->senderOrgUnit;
    }

    /**
     * @param null|string $senderOrgUnit
     * @return self
     */
    public function setSenderOrgUnit(?string $senderOrgUnit): self
    {
        $this->senderOrgUnit = $senderOrgUnit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSenderOrgUnitNum(): ?int
    {
        return $this->senderOrgUnitNum;
    }

    /**
     * @param int|null $senderOrgUnitNum
     * @return self
     */
    public function setSenderOrgUnitNum(?int $senderOrgUnitNum): self
    {
        $this->senderOrgUnitNum = $senderOrgUnitNum;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecipientID(): string
    {
        return $this->recipientID;
    }

    /**
     * @param string $recipientID
     * @return self
     */
    public function setRecipientID(string $recipientID): self
    {
        $this->recipientID = $recipientID;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipientOrgUnit(): ?string
    {
        return $this->recipientOrgUnit;
    }

    /**
     * @param null|string $recipientOrgUnit
     * @return self
     */
    public function setRecipientOrgUnit(?string $recipientOrgUnit): self
    {
        $this->recipientOrgUnit = $recipientOrgUnit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRecipientOrgUnitNum(): ?int
    {
        return $this->recipientOrgUnitNum;
    }

    /**
     * @param int|null $recipientOrgUnitNum
     * @return self
     */
    public function setRecipientOrgUnitNum(?int $recipientOrgUnitNum): self
    {
        $this->recipientOrgUnitNum = $recipientOrgUnitNum;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getToHands(): ?string
    {
        return $this->toHands;
    }

    /**
     * @param null|string $toHands
     * @return self
     */
    public function setToHands(?string $toHands): self
    {
        $this->toHands = $toHands;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAnnotation(): ?string
    {
        return $this->annotation;
    }

    /**
     * @param null|string $annotation
     * @return self
     */
    public function setAnnotation(?string $annotation): self
    {
        $this->annotation = $annotation;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipientRefNumber(): ?string
    {
        return $this->recipientRefNumber;
    }

    /**
     * @param null|string $recipientRefNumber
     * @return self
     */
    public function setRecipientRefNumber(?string $recipientRefNumber): self
    {
        $this->recipientRefNumber = $recipientRefNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderRefNumber(): ?string
    {
        return $this->senderRefNumber;
    }

    /**
     * @param null|string $senderRefNumber
     * @return self
     */
    public function setSenderRefNumber(?string $senderRefNumber): self
    {
        $this->senderRefNumber = $senderRefNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipientIdent(): ?string
    {
        return $this->recipientIdent;
    }

    /**
     * @param null|string $recipientIdent
     * @return self
     */
    public function setRecipientIdent(?string $recipientIdent): self
    {
        $this->recipientIdent = $recipientIdent;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderIdent(): ?string
    {
        return $this->senderIdent;
    }

    /**
     * @param null|string $senderIdent
     * @return self
     */
    public function setSenderIdent(?string $senderIdent): self
    {
        $this->senderIdent = $senderIdent;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLegalTitleLaw(): ?int
    {
        return $this->legalTitleLaw;
    }

    /**
     * @param int|null $legalTitleLaw
     * @return self
     */
    public function setLegalTitleLaw(?int $legalTitleLaw): self
    {
        $this->legalTitleLaw = $legalTitleLaw;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLegalTitleYear(): ?int
    {
        return $this->legalTitleYear;
    }

    /**
     * @param int|null $legalTitleYear
     * @return self
     */
    public function setLegalTitleYear(?int $legalTitleYear): self
    {
        $this->legalTitleYear = $legalTitleYear;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLegalTitleSect(): ?string
    {
        return $this->legalTitleSect;
    }

    /**
     * @param null|string $legalTitleSect
     * @return self
     */
    public function setLegalTitleSect(?string $legalTitleSect): self
    {
        $this->legalTitleSect = $legalTitleSect;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLegalTitlePar(): ?string
    {
        return $this->legalTitlePar;
    }

    /**
     * @param null|string $legalTitlePar
     * @return self
     */
    public function setLegalTitlePar(?string $legalTitlePar): self
    {
        $this->legalTitlePar = $legalTitlePar;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLegalTitlePoint(): ?string
    {
        return $this->legalTitlePoint;
    }

    /**
     * @param null|string $legalTitlePoint
     * @return self
     */
    public function setLegalTitlePoint(?string $legalTitlePoint): self
    {
        $this->legalTitlePoint = $legalTitlePoint;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPersonalDelivery(): ?bool
    {
        return $this->personalDelivery;
    }

    /**
     * @param bool|null $personalDelivery
     * @return self
     */
    public function setPersonalDelivery(?bool $personalDelivery): self
    {
        $this->personalDelivery = $personalDelivery;
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
     * @return self
     */
    public function setAllowSubstDelivery(?bool $allowSubstDelivery): self
    {
        $this->allowSubstDelivery = $allowSubstDelivery;
        return $this;
    }


}