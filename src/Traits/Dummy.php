<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait Dummy
{
    /**
     * @var null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbDummy")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $dummy;

    /**
     * @return null
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * @param null $dummy
     * @return self
     */
    public function setDummy($dummy): self
    {
        $this->dummy = $dummy;
        return $this;
    }


}