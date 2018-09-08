<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class PDZSendInfo
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:PDZSendInfo",namespace="http://isds.czechpoint.cz/v20")
 */
class PDZSendInfo implements IRequest
{
    /**
     * @var string 7
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbId")
     */
    protected $dataBoxID;
    /**
     * @var string 7
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:PDZType")
     */
    protected $type = 'Normal';

    /**
     * @return string
     */
    public function getDataBoxID(): string
    {
        return $this->dataBoxID;
    }

    /**
     * @param string $dataBoxID
     * @return PDZSendInfo
     */
    public function setDataBoxID(string $dataBoxID): PDZSendInfo
    {
        $this->dataBoxID = $dataBoxID;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return PDZSendInfo
     */
    public function setType(string $type): PDZSendInfo
    {
        $this->type = $type;
        return $this;
    }


}