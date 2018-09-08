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
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciFromDate")
     */
    private $fromDate;
    /**
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciTodate")
     */
    private $toDate;

    /**
     * @return \DateTime|null
     */
    public function getFromDate(): ?\DateTime
    {
        return $this->fromDate;
    }

    /**
     * @param \DateTime|null $fromDate
     * @return DataBoxCreditInfo
     */
    public function setFromDate(?\DateTime $fromDate): DataBoxCreditInfo
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getToDate(): ?\DateTime
    {
        return $this->toDate;
    }

    /**
     * @param \DateTime|null $toDate
     * @return DataBoxCreditInfo
     */
    public function setToDate(?\DateTime $toDate): DataBoxCreditInfo
    {
        $this->toDate = $toDate;
        return $this;
    }


}