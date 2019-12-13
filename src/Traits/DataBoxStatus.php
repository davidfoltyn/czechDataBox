<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataBoxStatus
{

    /**
     * @var \HelpPC\CzechDataBox\Entity\DataBoxStatus
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataBoxStatus")
     * @Serializer\SerializedName("p:dbStatus")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $status;

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataBoxStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataBoxStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataBoxStatus $status
     * @return self
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataBoxStatus $status): self
    {
        $this->status = $status;
        return $this;
    }
}