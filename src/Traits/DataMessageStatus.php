<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataMessageStatus
{

    /**
     * @var \HelpPC\CzechDataBox\Entity\DataMessageStatus
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataMessageStatus")
     * @Serializer\SerializedName("p:dmStatus")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $status;

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataMessageStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataMessageStatus $status
     * @return self
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): self
    {
        $this->status = $status;
        return $this;
    }


}