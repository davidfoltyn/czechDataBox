<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\PDZRecord;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class PDZInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:PDZInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class PDZInfo extends IResponse
{

    use DataBoxStatus;
    /**
     * @var Collection<int, PDZRecord>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\PDZRecord>")
     * @Serializer\XmlList(entry="dbPDZRecord", inline=false)
     * @Serializer\SerializedName("p:dbPDZRecords")
     */
    protected Collection $pdzRecord;

    public function __construct()
    {
        $this->pdzRecord = new ArrayCollection();
    }

    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataBoxStatus
    {
        return $this->status;
    }

    public function setStatus(\HelpPC\CzechDataBox\Entity\DataBoxStatus $status): PDZInfo
    {
        $this->status = $status;
        return $this;
    }


    /**
     * @return Collection<int, PDZRecord>
     */
    public function getPdzRecord(): Collection
    {
        return $this->pdzRecord;
    }

    /**
     * @param Collection<int, PDZRecord> $pdzRecord
     * @return PDZInfo
     */
    public function setPdzRecord(Collection $pdzRecord): PDZInfo
    {
        $this->pdzRecord = $pdzRecord;
        return $this;
    }

}