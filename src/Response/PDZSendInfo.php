<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class PDZInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:PDZSendInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class PDZSendInfo extends IResponse
{

    use DataBoxStatus;
    /**
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:PDZsiResult")
     */
    protected bool $result;

    public function isResult(): bool
    {
        return $this->result;
    }

}