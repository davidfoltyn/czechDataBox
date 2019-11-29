<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetDataBoxList
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetDataBoxListResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetDataBoxList implements IResponse
{
    use DataBoxStatus;
    /**
     * @var SplFileInfo|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("HelpPC\Serializer\Utils\SplFileInfo")
     * @Serializer\SerializedName("p:dblData")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $data;

    /**
     * @return null|SplFileInfo
     */
    public function getData(): ?SplFileInfo
    {
        return $this->data;
    }

    /**
     * @param SplFileInfo $data
     * @return GetDataBoxList
     */
    public function setData(SplFileInfo $data): GetDataBoxList
    {
        $this->data = $data;
        return $this;
    }


}