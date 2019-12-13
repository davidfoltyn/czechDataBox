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
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class DTInfo extends IResponse
{
    use DataBoxStatus;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTType")
     */
    protected ?int $ActDTType = null;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTCapacity")
     */
    protected ?int $ActDTCapacity = null;
    /**
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ActDTFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $ActDTFrom = null;
    /**
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ActDTTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $ActDTTo = null;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ActDTCapUsed")
     */
    protected ?int $ActDTCapUsed = null;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTType")
     */
    protected ?int $FutDTType = null;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTCapacity")
     */
    protected ?int $FutDTCapacity = null;
    /**
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:FutDTFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $FutDTFrom = null;
    /**
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:FutDTTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $FutDTTo = null;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:FutDTPaid")
     */
    protected ?int $FutDTPaid = null;

    public function getActDTType(): ?int
    {
        return $this->ActDTType;
    }

    public function getActDTCapacity(): ?int
    {
        return $this->ActDTCapacity;
    }

    public function getActDTFrom(): ?\DateTimeImmutable
    {
        return $this->ActDTFrom;
    }

    public function getActDTTo(): ?\DateTimeImmutable
    {
        return $this->ActDTTo;
    }

    public function getActDTCapUsed(): ?int
    {
        return $this->ActDTCapUsed;
    }

    public function getFutDTType(): ?int
    {
        return $this->FutDTType;
    }

    public function getFutDTCapacity(): ?int
    {
        return $this->FutDTCapacity;
    }

    public function getFutDTFrom(): ?\DateTimeImmutable
    {
        return $this->FutDTFrom;
    }

    public function getFutDTTo(): ?\DateTimeImmutable
    {
        return $this->FutDTTo;
    }

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