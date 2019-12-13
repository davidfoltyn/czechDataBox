<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use HelpPC\CzechDataBox\Traits\Address;
use HelpPC\CzechDataBox\Traits\PersonName;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserInfo
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbUserInfo")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class UserInfo
{
    use PersonName;
    use Address;
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
     * @Serializer\SerializedName("p:userID")
     */
    protected $userID;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:userType")
     */
    protected $userType;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:userPrivils")
     */
    protected $userPrivils;
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
     * @Serializer\SerializedName("p:firmName")
     */
    protected $firmName;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:caStreet")
     */
    protected $caStreet;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:caCity")
     */
    protected $caCity;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:caZipCode")
     */
    protected $caZipCode;

    /**
     * @return \DateTimeImmutable|null
     */
    public function getBiDate(): ?\DateTimeImmutable
    {
        return $this->biDate;
    }

    /**
     * @param \DateTimeImmutable|null $biDate
     * @return UserInfo
     */
    public function setBiDate(?\DateTimeImmutable $biDate): UserInfo
    {
        $this->biDate = $biDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserID(): ?string
    {
        return $this->userID;
    }

    /**
     * @param null|string $userID
     * @return UserInfo
     */
    public function setUserID(?string $userID): UserInfo
    {
        $this->userID = $userID;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserType(): ?string
    {
        return $this->userType;
    }

    /**
     * @param null|string $userType
     * @return UserInfo
     */
    public function setUserType(?string $userType): UserInfo
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserPrivils(): ?int
    {
        return $this->userPrivils;
    }

    /**
     * @param int|null $userPrivils
     * @return UserInfo
     */
    public function setUserPrivils(?int $userPrivils): UserInfo
    {
        $this->userPrivils = $userPrivils;
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
     * @return UserInfo
     */
    public function setIc(?string $ic): UserInfo
    {
        $this->ic = $ic;
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
     * @return UserInfo
     */
    public function setFirmName(?string $firmName): UserInfo
    {
        $this->firmName = $firmName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCaStreet(): ?string
    {
        return $this->caStreet;
    }

    /**
     * @param null|string $caStreet
     * @return UserInfo
     */
    public function setCaStreet(?string $caStreet): UserInfo
    {
        $this->caStreet = $caStreet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCaCity(): ?string
    {
        return $this->caCity;
    }

    /**
     * @param null|string $caCity
     * @return UserInfo
     */
    public function setCaCity(?string $caCity): UserInfo
    {
        $this->caCity = $caCity;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCaZipCode(): ?string
    {
        return $this->caZipCode;
    }

    /**
     * @param null|string $caZipCode
     * @return UserInfo
     */
    public function setCaZipCode(?string $caZipCode): UserInfo
    {
        $this->caZipCode = $caZipCode;
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
     * @return UserInfo
     */
    public function setAdCity(?string $adCity): UserInfo
    {
        $this->adCity = $adCity;
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
     * @return UserInfo
     */
    public function setAdStreet(?string $adStreet): UserInfo
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
     * @return UserInfo
     */
    public function setAdNumberInStreet(?string $adNumberInStreet): UserInfo
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
     * @return UserInfo
     */
    public function setAdNumberInMunicipality(?string $adNumberInMunicipality): UserInfo
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
     * @return UserInfo
     */
    public function setAdZipCode(?string $adZipCode): UserInfo
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
     * @return UserInfo
     */
    public function setAdState(?string $adState): UserInfo
    {
        $this->adState = $adState;
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
     * @return UserInfo
     */
    public function setFirstName(?string $firstName): UserInfo
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
     * @return UserInfo
     */
    public function setMiddleName(?string $middleName): UserInfo
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
     * @return UserInfo
     */
    public function setLastName(?string $lastName): UserInfo
    {
        $this->lastName = $lastName;
        return $this;
    }


}