<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Hash
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:dmHash")
 */
class Hash
{

    /**
     * @var SplFileInfo
     * @Serializer\Type("base64Binary")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlValue()
     */
    protected $value;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("algorithm")
     * @Serializer\XmlAttribute()
     */
    protected $algorithm;

    /**
     * @return SplFileInfo
     */
    public function getValue(): SplFileInfo
    {
        return $this->value;
    }

    /**
     * @param SplFileInfo $value
     * @return Hash
     */
    public function setValue(SplFileInfo $value): Hash
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @param string $algorithm
     * @return Hash
     */
    public function setAlgorithm(string $algorithm): Hash
    {
        $this->algorithm = $algorithm;
        return $this;
    }


}