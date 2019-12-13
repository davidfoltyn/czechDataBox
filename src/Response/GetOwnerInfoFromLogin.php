<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\Entity\OwnerInfo;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetOwnerInfoFromLogin
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetOwnerInfoFromLoginResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class GetOwnerInfoFromLogin extends IResponse
{
    use DataBoxStatus;
    /**
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\OwnerInfo")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbOwnerInfo")
     */
    protected OwnerInfo $ownerInfo;

    public function getOwnerInfo(): OwnerInfo
    {
        return $this->ownerInfo;
    }

}