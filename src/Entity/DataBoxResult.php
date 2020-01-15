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
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbType")
     */
    protected string $dataBoxType;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbName")
     */
    protected string $dataBoxName;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbAddress")
     */
    protected ?string $dataBoxAddress = NULL;
    /**
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbBiDate")
     * @Serializer\SkipWhenEmpty
     */
    protected ?\DateTimeImmutable $dataBoxBiDate = null;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbICO")
     * @Serializer\SkipWhenEmpty
     */
    protected ?string $dataBoxIco = null;
    /**
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbEffectiveOVM")
     * @Serializer\SkipWhenEmpty
     */
    protected ?bool $dataBoxEffectiveOVM = null;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbSendOptions")
     * @Serializer\SkipWhenEmpty
     */
    protected ?string $dataBoxSendOptions = null;

    public function getDataBoxType(): string
    {
        return $this->dataBoxType;
    }

    public function setDataBoxType(string $dataBoxType): DataBoxResult
    {
        $this->dataBoxType = $dataBoxType;
        return $this;
    }

    public function getDataBoxName(): string
    {
        return $this->dataBoxName;
    }

    public function setDataBoxName(string $dataBoxName): DataBoxResult
    {
        $this->dataBoxName = $dataBoxName;
        return $this;
    }

    public function getDataBoxAddress(): ?string
    {
        return $this->dataBoxAddress;
    }

    public function setDataBoxAddress(?string $dataBoxAddress): DataBoxResult
    {
        $this->dataBoxAddress = $dataBoxAddress;
        return $this;
    }

    public function getDataBoxBiDate(): ?\DateTimeImmutable
    {
        return $this->dataBoxBiDate;
    }

    public function setDataBoxBiDate(?\DateTimeImmutable $dataBoxBiDate): DataBoxResult
    {
        $this->dataBoxBiDate = $dataBoxBiDate;
        return $this;
    }

    public function getDataBoxIco(): ?string
    {
        return $this->dataBoxIco;
    }

    public function setDataBoxIco(?string $dataBoxIco): DataBoxResult
    {
        $this->dataBoxIco = $dataBoxIco;
        return $this;
    }

    public function getDataBoxEffectiveOVM(): ?bool
    {
        return $this->dataBoxEffectiveOVM;
    }

    public function setDataBoxEffectiveOVM(?bool $dataBoxEffectiveOVM): DataBoxResult
    {
        $this->dataBoxEffectiveOVM = $dataBoxEffectiveOVM;
        return $this;
    }

    public function getDataBoxSendOptions(): ?string
    {
        return $this->dataBoxSendOptions;
    }

    public function setDataBoxSendOptions(?string $dataBoxSendOptions): DataBoxResult
    {
        $this->dataBoxSendOptions = $dataBoxSendOptions;
        return $this;
    }

}