<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\CzechDataBox\Traits\Address;
use HelpPC\CzechDataBox\Traits\DataBoxId;
use HelpPC\CzechDataBox\Traits\PersonName;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class OwnerInfo
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbOwnerInfo")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class OwnerInfo
{
    use DataBoxId;
    use PersonName;
    use Address;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbType")
     */
    protected $dataBoxType;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ic")
     */
    protected $ic;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:pnLastNameAtBirth")
     */
    protected $lastNameAtBirth;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:firmName")
     */
    protected $firmName;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SerializedName("p:biDate")
     */
    protected $biDate;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:biCity")
     */
    protected $biCity;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:biCounty")
     */
    protected $biCounty;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:biState")
     */
    protected $biState;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:nationality")
     */
    protected $nationality;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:email")
     */
    protected $email;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:telNumber")
     */
    protected $telNumber;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:identifier")
     */
    protected $identifier;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:registryCode")
     */
    protected $registryCode;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbState")
     */
    protected $dataBoxState;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbEffectiveOVM")
     */
    protected $dataBoxEffectiveOVM;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbOpenAddressing")
     */
    protected $dataBoxOpenAddressing;

    /**
     * @return string
     */
    public function getDataBoxType(): string
    {
        return $this->dataBoxType;
    }

    /**
     * @param string $dataBoxType
     * @return OwnerInfo
     */
    public function setDataBoxType(string $dataBoxType): OwnerInfo
    {
        $this->dataBoxType = $dataBoxType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIc(): ?string
    {
        return $this->ic;
    }

    /**
     * @param null|string $ic
     * @return OwnerInfo
     */
    public function setIc(?string $ic): OwnerInfo
    {
        $this->ic = $ic;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastNameAtBirth(): ?string
    {
        return $this->lastNameAtBirth;
    }

    /**
     * @param null|string $lastNameAtBirth
     * @return OwnerInfo
     */
    public function setLastNameAtBirth(?string $lastNameAtBirth): OwnerInfo
    {
        $this->lastNameAtBirth = $lastNameAtBirth;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirmName(): ?string
    {
        return $this->firmName;
    }

    /**
     * @param null|string $firmName
     * @return OwnerInfo
     */
    public function setFirmName(?string $firmName): OwnerInfo
    {
        $this->firmName = $firmName;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getBiDate(): ?\DateTimeImmutable
    {
        return $this->biDate;
    }

    /**
     * @param \DateTimeImmutable|null $biDate
     * @return OwnerInfo
     */
    public function setBiDate(?\DateTimeImmutable $biDate): OwnerInfo
    {
        $this->biDate = $biDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBiCity(): ?string
    {
        return $this->biCity;
    }

    /**
     * @param null|string $biCity
     * @return OwnerInfo
     */
    public function setBiCity(?string $biCity): OwnerInfo
    {
        $this->biCity = $biCity;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBiCounty(): ?string
    {
        return $this->biCounty;
    }

    /**
     * @param null|string $biCounty
     * @return OwnerInfo
     */
    public function setBiCounty(?string $biCounty): OwnerInfo
    {
        $this->biCounty = $biCounty;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBiState(): ?string
    {
        return $this->biState;
    }

    /**
     * @param null|string $biState
     * @return OwnerInfo
     */
    public function setBiState(?string $biState): OwnerInfo
    {
        $this->biState = $biState;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @param null|string $nationality
     * @return OwnerInfo
     */
    public function setNationality(?string $nationality): OwnerInfo
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return OwnerInfo
     */
    public function setEmail(?string $email): OwnerInfo
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelNumber(): ?string
    {
        return $this->telNumber;
    }

    /**
     * @param null|string $telNumber
     * @return OwnerInfo
     */
    public function setTelNumber(?string $telNumber): OwnerInfo
    {
        $this->telNumber = $telNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @param null|string $identifier
     * @return OwnerInfo
     */
    public function setIdentifier(?string $identifier): OwnerInfo
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRegistryCode(): ?string
    {
        return $this->registryCode;
    }

    /**
     * @param null|string $registryCode
     * @return OwnerInfo
     */
    public function setRegistryCode(?string $registryCode): OwnerInfo
    {
        $this->registryCode = $registryCode;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDataBoxState(): ?int
    {
        return $this->dataBoxState;
    }

    /**
     * @param int|null $dataBoxState
     * @return OwnerInfo
     */
    public function setDataBoxState(?int $dataBoxState): OwnerInfo
    {
        $this->dataBoxState = $dataBoxState;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDataBoxEffectiveOVM(): ?bool
    {
        return $this->dataBoxEffectiveOVM;
    }

    /**
     * @param bool|null $dataBoxEffectiveOVM
     * @return OwnerInfo
     */
    public function setDataBoxEffectiveOVM(?bool $dataBoxEffectiveOVM): OwnerInfo
    {
        $this->dataBoxEffectiveOVM = $dataBoxEffectiveOVM;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDataBoxOpenAddressing(): ?bool
    {
        return $this->dataBoxOpenAddressing;
    }

    /**
     * @param bool|null $dataBoxOpenAddressing
     * @return OwnerInfo
     */
    public function setDataBoxOpenAddressing(?bool $dataBoxOpenAddressing): OwnerInfo
    {
        $this->dataBoxOpenAddressing = $dataBoxOpenAddressing;
        return $this;
    }


}