<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataBoxId
{
    /**
     * @var string 7
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbID")
     */
    protected $dataBoxId;

    /**
     * @return string
     */
    public function getDataBoxId(): string
    {
        return $this->dataBoxId;
    }

    /**
     * @param string $dataBoxId
     * @return self
     */
    public function setDataBoxId(string $dataBoxId): self
    {
        $this->dataBoxId = $dataBoxId;
        return $this;
    }

}