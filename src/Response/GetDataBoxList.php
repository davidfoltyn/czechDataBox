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
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class GetDataBoxList extends IResponse
{
    use DataBoxStatus;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("base64File")
     * @Serializer\SerializedName("p:dblData")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?SplFileInfo $data = null;

    public function getData(): ?SplFileInfo
    {
        return $this->data;
    }

    public function setData(SplFileInfo $data): GetDataBoxList
    {
        $this->data = $data;
        return $this;
    }


}