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
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciFromDate")
     */
    private ?\DateTimeImmutable $fromDate;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciTodate")
     */
    private ?\DateTimeImmutable $toDate;

    public function getFromDate(): ?\DateTimeImmutable
    {
        return $this->fromDate;
    }

    public function setFromDate(?\DateTimeImmutable $fromDate): DataBoxCreditInfo
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    public function getToDate(): ?\DateTimeImmutable
    {
        return $this->toDate;
    }

    public function setToDate(?\DateTimeImmutable $toDate): DataBoxCreditInfo
    {
        $this->toDate = $toDate;
        return $this;
    }


}