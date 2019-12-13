<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\PersonalOwnerInfo;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class FindPersonalDataBoxResponse
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:FindPersonalDataBoxResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class FindPersonalDataBox extends IResponse
{
    use DataBoxStatus;

    /**
     * @var Collection<int, PersonalOwnerInfo>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\PersonalOwnerInfo>")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlList(entry="dbOwnerInfo", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dbResults")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $record;

    public function __construct()
    {
        $this->record = new ArrayCollection();
    }

    /**
     * @return Collection<int, PersonalOwnerInfo>
     */
    public function getRecord(): Collection
    {
        return $this->record;
    }

}