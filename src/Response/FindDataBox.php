<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\OwnerInfo;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class FindDataBox
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:FindDataBoxResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class FindDataBox extends IResponse
{
    use DataBoxStatus;
    /**
     * @var Collection<int, OwnerInfo>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\OwnerInfo>")
     * @Serializer\XmlList(entry="dbOwnerInfo", inline=false,namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dbResults")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected Collection $result;

    public function __construct()
    {
        $this->result = new ArrayCollection();
    }

    /**
     * @return Collection<int, OwnerInfo>
     */
    public function getResult(): Collection
    {
        return $this->result;
    }

}