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
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataMessageStatus")
     * @Serializer\SerializedName("p:dmStatus")
     * @Serializer\XmlElement(cdata=false)
     */
    protected \HelpPC\CzechDataBox\Entity\DataMessageStatus $status;

    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): self
    {
        $this->status = $status;
        return $this;
    }


}