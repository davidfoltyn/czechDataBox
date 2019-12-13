<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\Period;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxId;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetDataBoxActivityStatus
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetDataBoxActivityStatusResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class GetDataBoxActivityStatus extends IResponse
{
    use DataBoxStatus;
    use DataBoxId;

    /**
     * @var Collection<int, Period>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\Period>")
     * @Serializer\XmlList(entry="Period", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("Periods")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $period;

    public function __construct()
    {
        $this->period = new ArrayCollection();
    }

    /**
     * @return Collection<int, Period>
     */
    public function getPeriod(): Collection
    {
        return $this->period;
    }


}