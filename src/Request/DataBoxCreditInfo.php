<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\DataBoxId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class DataBoxCreditInfo
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:DataBoxCreditInfo",namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessorOrder("custom",custom={"dataBoxId","fromDate","toDate"})
 */
class DataBoxCreditInfo implements IRequest
{
    use DataBoxId;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciFromDate")
     */
    private $fromDate;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciTodate")
     */
    private $toDate;

    /**
     * @return \DateTimeImmutable|null
     */
    public function getFromDate(): ?\DateTimeImmutable
    {
        return $this->fromDate;
    }

    /**
     * @param \DateTimeImmutable|null $fromDate
     * @return DataBoxCreditInfo
     */
    public function setFromDate(?\DateTimeImmutable $fromDate): DataBoxCreditInfo
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getToDate(): ?\DateTimeImmutable
    {
        return $this->toDate;
    }

    /**
     * @param \DateTimeImmutable|null $toDate
     * @return DataBoxCreditInfo
     */
    public function setToDate(?\DateTimeImmutable $toDate): DataBoxCreditInfo
    {
        $this->toDate = $toDate;
        return $this;
    }


}