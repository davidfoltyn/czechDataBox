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
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbId")
     */
    protected string $dataBoxID;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:PDZType")
     */
    protected string $type = 'Normal';

    public function getDataBoxID(): string
    {
        return $this->dataBoxID;
    }

    public function setDataBoxID(string $dataBoxID): PDZSendInfo
    {
        $this->dataBoxID = $dataBoxID;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): PDZSendInfo
    {
        $this->type = $type;
        return $this;
    }


}