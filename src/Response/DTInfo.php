<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class DTInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:DTInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class DTInfo implements IResponse
{
    use DataBoxStatus;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTType")
     */
    protected $ActDTType;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTCapacity")
     */
    protected $ActDTCapacity;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ActDTFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $ActDTFrom;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ActDTTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $ActDTTo;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTCapUsed")
     */
    protected $ActDTCapUsed;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTType")
     */
    protected $FutDTType;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTCapacity")
     */
    protected $FutDTCapacity;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:FutDTFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $FutDTFrom;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:FutDTTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $FutDTTo;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTPaid")
     */
    protected $FutDTPaid;

    /**
     * @return int|null
     */
    public function getActDTType(): ?int
    {
        return $this->ActDTType;
    }

    /**
     * @return int|null
     */
    public function getActDTCapacity(): ?int
    {
        return $this->ActDTCapacity;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getActDTFrom(): ?\DateTimeImmutable
    {
        return $this->ActDTFrom;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getActDTTo(): ?\DateTimeImmutable
    {
        return $this->ActDTTo;
    }

    /**
     * @return int|null
     */
    public function getActDTCapUsed(): ?int
    {
        return $this->ActDTCapUsed;
    }

    /**
     * @return int|null
     */
    public function getFutDTType(): ?int
    {
        return $this->FutDTType;
    }

    /**
     * @return int|null
     */
    public function getFutDTCapacity(): ?int
    {
        return $this->FutDTCapacity;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFutDTFrom(): ?\DateTimeImmutable
    {
        return $this->FutDTFrom;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFutDTTo(): ?\DateTimeImmutable
    {
        return $this->FutDTTo;
    }

    /**
     * @return int|null
     */
    public function getFutDTPaid(): ?int
    {
        return $this->FutDTPaid;
    }

    public function isCredit(): bool
    {
        return $this->ActDTType === 1;
    }

    public function isFlatRate(): bool
    {
        return $this->ActDTType === 3;
    }

    public function isAction(): bool
    {
        return $this->ActDTType === 4;
    }

    public function isFutureCredit(): bool
    {
        return $this->FutDTType === 1;
    }

    public function isFutureFlatRate(): bool
    {
        return $this->FutDTType === 3;
    }

    public function isFutureAction(): bool
    {
        return $this->FutDTType === 4;
    }

}