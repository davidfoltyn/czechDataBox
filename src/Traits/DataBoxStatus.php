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
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\DataBoxStatus")
     * @Serializer\SerializedName("p:dbStatus")
     * @Serializer\XmlElement(cdata=false)
     */
    protected \HelpPC\CzechDataBox\Entity\DataBoxStatus $status;

    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataBoxStatus
    {
        return $this->status;
    }

}