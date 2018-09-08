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
 * Class ISDSSearch2
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ISDSSearch2Response", namespace="http://isds.czechpoint.cz/v20")
 */
class ISDSSearch2 implements IResponse
{

    use DataBoxStatus;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:totalCount")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $totalCount;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:currentCount")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $currentCount;
    /**
     * @var int|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:position")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $position;
    /**
     * @var bool|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:lastPage")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $lastPage;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\DataBoxResult>")
     * @Serializer\XmlList(entry="dbResult", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dbResults")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $result;

    public function __construct()
    {
        $this->result = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param int|null $totalCount
     * @return ISDSSearch2
     */
    public function setTotalCount(?int $totalCount): ISDSSearch2
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentCount(): ?int
    {
        return $this->currentCount;
    }

    /**
     * @param int|null $currentCount
     * @return ISDSSearch2
     */
    public function setCurrentCount(?int $currentCount): ISDSSearch2
    {
        $this->currentCount = $currentCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     * @return ISDSSearch2
     */
    public function setPosition(?int $position): ISDSSearch2
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLastPage(): ?bool
    {
        return $this->lastPage;
    }

    /**
     * @param bool|null $lastPage
     * @return ISDSSearch2
     */
    public function setLastPage(?bool $lastPage): ISDSSearch2
    {
        $this->lastPage = $lastPage;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getResult(): ArrayCollection
    {
        return $this->result;
    }

    /**
     * @param ArrayCollection $result
     * @return ISDSSearch2
     */
    public function setResult(ArrayCollection $result): ISDSSearch2
    {
        $this->result = $result;
        return $this;
    }

}