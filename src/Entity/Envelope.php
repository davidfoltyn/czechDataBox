<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use HelpPC\CzechDataBox\Traits\DataMessageEnvelopeSub;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Envelope
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmEnvelope")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\AccessorOrder("custom",custom={
"senderOrgUnit",
"senderOrgUnitNum",
"annotation",
"recipientRefNumber",
"senderRefNumber",
"recipientIdent","senderIdent","legalTitleLaw","legalTitleYear","legalTitleSect","legalTitlePar","legalTitlePoint","personalDelivery","allowSubstDelivery","OVM","publishOwnID"})
 */
class Envelope
{

    use DataMessageEnvelopeSub;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("dmType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlAttribute()
     */
    protected $type;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:dmAllowSubstDelivery")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $allowSubstDelivery;
    /**
     * @var bool|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:dmOVM")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $OVM;
    /**
     * @var bool|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:dmPublishOwnID")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $publishOwnID;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Envelope
     */
    public function setType(string $type): Envelope
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSenderOrgUnit(): ?string
    {
        return $this->senderOrgUnit;
    }

    /**
     * @param null|string $senderOrgUnit
     * @return Envelope
     */
    public function setSenderOrgUnit(?string $senderOrgUnit): Envelope
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
     * @return Envelope
     */
    public function setSenderOrgUnitNum(?int $senderOrgUnitNum): Envelope
    {
        $this->senderOrgUnitNum = $senderOrgUnitNum;
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
     * @return Envelope
     */
    public function setAnnotation(?string $annotation): Envelope
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
     * @return Envelope
     */
    public function setRecipientRefNumber(?string $recipientRefNumber): Envelope
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
     * @return Envelope
     */
    public function setSenderRefNumber(?string $senderRefNumber): Envelope
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
     * @return Envelope
     */
    public function setRecipientIdent(?string $recipientIdent): Envelope
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
     * @return Envelope
     */
    public function setSenderIdent(?string $senderIdent): Envelope
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
     * @return Envelope
     */
    public function setLegalTitleLaw(?int $legalTitleLaw): Envelope
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
     * @return Envelope
     */
    public function setLegalTitleYear(?int $legalTitleYear): Envelope
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
     * @return Envelope
     */
    public function setLegalTitleSect(?string $legalTitleSect): Envelope
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
     * @return Envelope
     */
    public function setLegalTitlePar(?string $legalTitlePar): Envelope
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
     * @return Envelope
     */
    public function setLegalTitlePoint(?string $legalTitlePoint): Envelope
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
     * @return Envelope
     */
    public function setPersonalDelivery(?bool $personalDelivery): Envelope
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
     * @return Envelope
     */
    public function setAllowSubstDelivery(?bool $allowSubstDelivery): Envelope
    {
        $this->allowSubstDelivery = $allowSubstDelivery;
        return $this;
    }

    /**
     * Schránky typu FO, PO a PFO, které mají povoleno vystupovat jako OVM (podle § 5a) musejí již při vytváření DZ určit, v jakém režimu (OVM x ne-OVM) odesílají. Význam to má z procesních (a účetních) důvodů.
     * @return bool|null
     */
    public function getOVM(): ?bool
    {
        return $this->OVM;
    }

    /**
     * Schránky typu FO, PO a PFO, které mají povoleno vystupovat jako OVM (podle § 5a) musejí již při vytváření DZ určit, v jakém režimu (OVM x ne-OVM) odesílají. Význam to má z procesních (a účetních) důvodů.
     * @param bool|null $OVM
     * @return Envelope
     */
    public function setOVM(?bool $OVM): Envelope
    {
        $this->OVM = $OVM;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPublishOwnID(): ?bool
    {
        return $this->publishOwnID;
    }

    /**
     * @param bool|null $publishOwnID
     * @return Envelope
     */
    public function setPublishOwnID(?bool $publishOwnID): Envelope
    {
        $this->publishOwnID = $publishOwnID;
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
     * @return Envelope
     */
    public function setRecipientID(string $recipientID): Envelope
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
     * @return Envelope
     */
    public function setRecipientOrgUnit(?string $recipientOrgUnit): Envelope
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
     * @return Envelope
     */
    public function setRecipientOrgUnitNum(?int $recipientOrgUnitNum): Envelope
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
     * @return Envelope
     */
    public function setToHands(?string $toHands): Envelope
    {
        $this->toHands = $toHands;
        return $this;
    }


}