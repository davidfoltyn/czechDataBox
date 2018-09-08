<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class PDZInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:PDZInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class PDZInfo implements IResponse
{

    use DataBoxStatus;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\PDZRecord>")
     * @Serializer\XmlList(entry="dbPDZRecord", inline=false)
     * @Serializer\SerializedName("p:dbPDZRecords")
     */
    protected $pdzRecord;

    public function __construct()
    {
        $this->pdzRecord = new ArrayCollection();
    }

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataBoxStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataBoxStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataBoxStatus $status
     * @return PDZInfo
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataBoxStatus $status): PDZInfo
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPdzRecord(): ArrayCollection
    {
        return $this->pdzRecord;
    }

    /**
     * @param ArrayCollection $pdzRecord
     * @return PDZInfo
     */
    public function setPdzRecord(ArrayCollection $pdzRecord): PDZInfo
    {
        $this->pdzRecord = $pdzRecord;
        return $this;
    }

}