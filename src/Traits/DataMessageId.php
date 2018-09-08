<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait DataMessageId
{
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmID")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $dataMessageId;

    /**
     * @return string|null
     */
    public function getDataMessageId(): ?string
    {
        return $this->dataMessageId;
    }

    /**
     * @param string $dataMessageId
     * @return self
     */
    public function setDataMessageId(string $dataMessageId): self
    {
        $this->dataMessageId = $dataMessageId;
        return $this;
    }


}