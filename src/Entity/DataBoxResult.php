<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use HelpPC\CzechDataBox\Traits\DataBoxId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class DataBoxResult
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbResult")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class DataBoxResult
{
    use DataBoxId;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbType")
     */
    protected $dataBoxType;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbName")
     */
    protected $dataBoxName;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbAddress")
     */
    protected $dataBoxAddress;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbBiDate")
     */
    protected $dataBoxBiDate;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbICO")
     */
    protected $dataBoxIco;
    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbEffectiveOVM")
     */
    protected $dataBoxEffectiveOVM;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbSendOptions")
     */
    protected $dataBoxSendOptions;

    /**
     * @return string
     */
    public function getDataBoxType(): string
    {
        return $this->dataBoxType;
    }

    /**
     * @param string $dataBoxType
     * @return DataBoxResult
     */
    public function setDataBoxType(string $dataBoxType): DataBoxResult
    {
        $this->dataBoxType = $dataBoxType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataBoxName(): string
    {
        return $this->dataBoxName;
    }

    /**
     * @param string $dataBoxName
     * @return DataBoxResult
     */
    public function setDataBoxName(string $dataBoxName): DataBoxResult
    {
        $this->dataBoxName = $dataBoxName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataBoxAddress(): string
    {
        return $this->dataBoxAddress;
    }

    /**
     * @param string $dataBoxAddress
     * @return DataBoxResult
     */
    public function setDataBoxAddress(string $dataBoxAddress): DataBoxResult
    {
        $this->dataBoxAddress = $dataBoxAddress;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDataBoxBiDate(): ?\DateTimeImmutable
    {
        return $this->dataBoxBiDate;
    }

    /**
     * @param \DateTimeImmutable|null $dataBoxBiDate
     * @return DataBoxResult
     */
    public function setDataBoxBiDate(?\DateTimeImmutable $dataBoxBiDate): DataBoxResult
    {
        $this->dataBoxBiDate = $dataBoxBiDate;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDataBoxIco(): ?string
    {
        return $this->dataBoxIco;
    }

    /**
     * @param null|string $dataBoxIco
     * @return DataBoxResult
     */
    public function setDataBoxIco(?string $dataBoxIco): DataBoxResult
    {
        $this->dataBoxIco = $dataBoxIco;
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
     * @return DataBoxResult
     */
    public function setDataBoxEffectiveOVM(?bool $dataBoxEffectiveOVM): DataBoxResult
    {
        $this->dataBoxEffectiveOVM = $dataBoxEffectiveOVM;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDataBoxSendOptions(): ?string
    {
        return $this->dataBoxSendOptions;
    }

    /**
     * @param null|string $dataBoxSendOptions
     * @return DataBoxResult
     */
    public function setDataBoxSendOptions(?string $dataBoxSendOptions): DataBoxResult
    {
        $this->dataBoxSendOptions = $dataBoxSendOptions;
        return $this;
    }

}