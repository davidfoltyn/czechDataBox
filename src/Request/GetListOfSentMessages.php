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
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmFromTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $listFrom;
    /**
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmToTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $listTo;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmRecipientOrgUnitNum")
     */
    protected $recipientOrgUnitNum;
    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmStatusFilter")
     */
    protected $statusFilter;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmOffset")
     */
    protected $offset;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmLimit")
     */
    protected $limit;

    /**
     * @return \DateTime|null
     */
    public function getListFrom(): ?\DateTime
    {
        return $this->listFrom;
    }

    /**
     * @param \DateTime|null $listFrom
     * @return GetListOfSentMessages
     */
    public function setListFrom(?\DateTime $listFrom): GetListOfSentMessages
    {
        $this->listFrom = $listFrom;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getListTo(): ?\DateTime
    {
        return $this->listTo;
    }

    /**
     * @param \DateTime|null $listTo
     * @return GetListOfSentMessages
     */
    public function setListTo(?\DateTime $listTo): GetListOfSentMessages
    {
        $this->listTo = $listTo;
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
     * @return GetListOfSentMessages
     */
    public function setRecipientOrgUnitNum(?int $recipientOrgUnitNum): GetListOfSentMessages
    {
        $this->recipientOrgUnitNum = $recipientOrgUnitNum;
        return $this;
    }

    /**
     * @return float
     */
    public function getStatusFilter(): float
    {
        return $this->statusFilter;
    }

    /**
     * @param float $statusFilter
     * @return GetListOfSentMessages
     */
    public function setStatusFilter(float $statusFilter): GetListOfSentMessages
    {
        $this->statusFilter = $statusFilter;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     * @return GetListOfSentMessages
     */
    public function setOffset(?int $offset): GetListOfSentMessages
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     * @return GetListOfSentMessages
     */
    public function setLimit(?int $limit): GetListOfSentMessages
    {
        $this->limit = $limit;
        return $this;
    }


}