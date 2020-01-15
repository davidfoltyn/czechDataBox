<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetListOfSentMessages
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetListOfSentMessages",namespace="http://isds.czechpoint.cz/v20")
 */
class GetListOfSentMessages implements IRequest
{
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmFromTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $listFrom = NULL;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmToTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?\DateTimeImmutable $listTo = NULL;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmRecipientOrgUnitNum")
     */
    protected ?int $recipientOrgUnitNum = NULL;
    /**
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusFilter")
     */
    protected ?float $statusFilter = NULL;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmOffset")
     */
    protected ?int $offset = NULL;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmLimit")
     */
    protected ?int $limit = NULL;

    public function getListFrom(): ?\DateTimeImmutable
    {
        return $this->listFrom;
    }

    public function setListFrom(?\DateTimeImmutable $listFrom): GetListOfSentMessages
    {
        $this->listFrom = $listFrom;
        return $this;
    }

    public function getListTo(): ?\DateTimeImmutable
    {
        return $this->listTo;
    }

    public function setListTo(?\DateTimeImmutable $listTo): GetListOfSentMessages
    {
        $this->listTo = $listTo;
        return $this;
    }

    public function getRecipientOrgUnitNum(): ?int
    {
        return $this->recipientOrgUnitNum;
    }

    public function setRecipientOrgUnitNum(?int $recipientOrgUnitNum): GetListOfSentMessages
    {
        $this->recipientOrgUnitNum = $recipientOrgUnitNum;
        return $this;
    }

    public function getStatusFilter(): float
    {
        return $this->statusFilter;
    }

    public function setStatusFilter(float $statusFilter): GetListOfSentMessages
    {
        $this->statusFilter = $statusFilter;
        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): GetListOfSentMessages
    {
        $this->offset = $offset;
        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): GetListOfSentMessages
    {
        $this->limit = $limit;
        return $this;
    }


}