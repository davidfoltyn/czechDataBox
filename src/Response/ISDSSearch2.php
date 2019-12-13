<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use HelpPC\CzechDataBox\Entity\DataBoxResult;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ISDSSearch2
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ISDSSearch2Response", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class ISDSSearch2 extends IResponse
{

    use DataBoxStatus;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:totalCount")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?int $totalCount = null;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:currentCount")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?int $currentCount = null;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:position")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?int $position = null;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:lastPage")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?bool $lastPage = null;
    /**
     * @var Collection<int, DataBoxResult>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\DataBoxResult>")
     * @Serializer\XmlList(entry="dbResult", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dbResults")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected Collection $result;

    public function __construct()
    {
        $this->result = new ArrayCollection();
    }

    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    public function setTotalCount(?int $totalCount): ISDSSearch2
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    public function getCurrentCount(): ?int
    {
        return $this->currentCount;
    }

    public function setCurrentCount(?int $currentCount): ISDSSearch2
    {
        $this->currentCount = $currentCount;
        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): ISDSSearch2
    {
        $this->position = $position;
        return $this;
    }

    public function getLastPage(): ?bool
    {
        return $this->lastPage;
    }

    public function setLastPage(?bool $lastPage): ISDSSearch2
    {
        $this->lastPage = $lastPage;
        return $this;
    }

    /**
     * @return Collection<int, DataBoxResult>
     */
    public function getResult(): Collection
    {
        return $this->result;
    }

    /**
     * @param ArrayCollection<int, DataBoxResult> $result
     * @return ISDSSearch2
     */
    public function setResult(ArrayCollection $result): ISDSSearch2
    {
        $this->result = $result;
        return $this;
    }

}