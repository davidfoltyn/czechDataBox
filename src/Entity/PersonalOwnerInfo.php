<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\CzechDataBox\Traits\DataBoxId;
use HelpPC\CzechDataBox\Traits\PersonName;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class PersonalOwnerInfo
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbOwnerInfo")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class PersonalOwnerInfo
{
    use DataBoxId;
    use PersonName;

    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:aifoIsds")
     */
    protected $aifoIsds;
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
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adCode")
     */
    protected $adCode;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adCity")
     */
    protected $adCity;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adStreet")
     */
    protected $adDistrict;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adStreet")
     */
    protected $adStreet;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adNumberInStreet")
     */
    protected $adNumberInStreet;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adNumberInMunicipality")
     */
    protected $adNumberInMunicipality;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adZipCode")
     */
    protected $adZipCode;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adState")
     */
    protected $adState;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:nationality")
     */
    protected $nationality;

    /**
     * @return bool|null
     */
    public function getAifoIsds(): ?bool
    {
        return $this->aifoIsds;
    }

    /**
     * @param bool|null $aifoIsds
     * @return PersonalOwnerInfo
     */
    public function setAifoIsds(?bool $aifoIsds): PersonalOwnerInfo
    {
        $this->aifoIsds = $aifoIsds;
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
     * @return PersonalOwnerInfo
     */
    public function setBiDate(?\DateTimeImmutable $biDate): PersonalOwnerInfo
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
     * @return PersonalOwnerInfo
     */
    public function setBiCity(?string $biCity): PersonalOwnerInfo
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
     * @return PersonalOwnerInfo
     */
    public function setBiCounty(?string $biCounty): PersonalOwnerInfo
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
     * @return PersonalOwnerInfo
     */
    public function setBiState(?string $biState): PersonalOwnerInfo
    {
        $this->biState = $biState;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAdCode(): ?int
    {
        return $this->adCode;
    }

    /**
     * @param int|null $adCode
     * @return PersonalOwnerInfo
     */
    public function setAdCode(?int $adCode): PersonalOwnerInfo
    {
        $this->adCode = $adCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdCity(): ?string
    {
        return $this->adCity;
    }

    /**
     * @param null|string $adCity
     * @return PersonalOwnerInfo
     */
    public function setAdCity(?string $adCity): PersonalOwnerInfo
    {
        $this->adCity = $adCity;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdDistrict(): ?string
    {
        return $this->adDistrict;
    }

    /**
     * @param null|string $adDistrict
     * @return PersonalOwnerInfo
     */
    public function setAdDistrict(?string $adDistrict): PersonalOwnerInfo
    {
        $this->adDistrict = $adDistrict;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdStreet(): ?string
    {
        return $this->adStreet;
    }

    /**
     * @param null|string $adStreet
     * @return PersonalOwnerInfo
     */
    public function setAdStreet(?string $adStreet): PersonalOwnerInfo
    {
        $this->adStreet = $adStreet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdNumberInStreet(): ?string
    {
        return $this->adNumberInStreet;
    }

    /**
     * @param null|string $adNumberInStreet
     * @return PersonalOwnerInfo
     */
    public function setAdNumberInStreet(?string $adNumberInStreet): PersonalOwnerInfo
    {
        $this->adNumberInStreet = $adNumberInStreet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdNumberInMunicipality(): ?string
    {
        return $this->adNumberInMunicipality;
    }

    /**
     * @param null|string $adNumberInMunicipality
     * @return PersonalOwnerInfo
     */
    public function setAdNumberInMunicipality(?string $adNumberInMunicipality): PersonalOwnerInfo
    {
        $this->adNumberInMunicipality = $adNumberInMunicipality;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdZipCode(): ?string
    {
        return $this->adZipCode;
    }

    /**
     * @param null|string $adZipCode
     * @return PersonalOwnerInfo
     */
    public function setAdZipCode(?string $adZipCode): PersonalOwnerInfo
    {
        $this->adZipCode = $adZipCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdState(): ?string
    {
        return $this->adState;
    }

    /**
     * @param null|string $adState
     * @return PersonalOwnerInfo
     */
    public function setAdState(?string $adState): PersonalOwnerInfo
    {
        $this->adState = $adState;
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
     * @return PersonalOwnerInfo
     */
    public function setNationality(?string $nationality): PersonalOwnerInfo
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param null|string $firstName
     * @return PersonalOwnerInfo
     */
    public function setFirstName(?string $firstName): PersonalOwnerInfo
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    /**
     * @param null|string $middleName
     * @return PersonalOwnerInfo
     */
    public function setMiddleName(?string $middleName): PersonalOwnerInfo
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param null|string $lastName
     * @return PersonalOwnerInfo
     */
    public function setLastName(?string $lastName): PersonalOwnerInfo
    {
        $this->lastName = $lastName;
        return $this;
    }


}