<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use HelpPC\Serializer\Utils\SplFileInfo;

trait Signature
{

    /**
     * @var SplFileInfo|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("base64File")
     * @Serializer\SerializedName("p:dmSignature")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $signature;

    /**
     * @return null|SplFileInfo
     */
    public function getSignature(): ?SplFileInfo
    {
        return $this->signature;
    }

    /**
     * @param SplFileInfo $signature
     * @return self
     */
    public function setSignature(SplFileInfo $signature): self
    {
        $this->signature = $signature;
        return $this;
    }


}