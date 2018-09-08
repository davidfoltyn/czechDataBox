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
 * Class GetDataBoxList
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetDataBoxList",namespace="http://isds.czechpoint.cz/v20")
 */
class GetDataBoxList implements IRequest
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dblType")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return GetDataBoxList
     */
    public function setType(string $type): GetDataBoxList
    {
        $this->type = $type;
        return $this;
    }


}