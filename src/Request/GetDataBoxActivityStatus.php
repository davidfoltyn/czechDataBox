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
 * Class GetDataBoxActivityStatus
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetDataBoxActivityStatus",namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessorOrder("custom",custom={"dataBoxId","from","to"})
 */
class GetDataBoxActivityStatus implements IRequest
{
    use DataBoxId;
    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:baFrom")
     */
    private $from;
    /**
     * @var \DateTimeImmutable
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:baTo")
     */
    private $to;

    public function __construct()
    {
        $this->setTo((new \DateTimeImmutable()));
        $this->setFrom((new \DateTimeImmutable('-3 month')));
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getFrom(): \DateTimeImmutable
    {
        return $this->from;
    }

    /**
     * @param \DateTimeImmutable $from
     * @return GetDataBoxActivityStatus
     */
    public function setFrom(\DateTimeImmutable $from): GetDataBoxActivityStatus
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getTo(): \DateTimeImmutable
    {
        return $this->to;
    }

    /**
     * @param \DateTimeImmutable $to
     * @return GetDataBoxActivityStatus
     */
    public function setTo(\DateTimeImmutable $to): GetDataBoxActivityStatus
    {
        $this->to = $to;
        return $this;
    }

}