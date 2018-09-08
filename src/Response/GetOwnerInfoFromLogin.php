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
 */
class GetOwnerInfoFromLogin implements IResponse
{
    use DataBoxStatus;
    /**
     * @var OwnerInfo
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\OwnerInfo")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dbOwnerInfo")
     */
    protected $ownerInfo;

    /**
     * @return OwnerInfo
     */
    public function getOwnerInfo(): OwnerInfo
    {
        return $this->ownerInfo;
    }

    /**
     * @param OwnerInfo $ownerInfo
     * @return GetOwnerInfoFromLogin
     */
    public function setOwnerInfo(OwnerInfo $ownerInfo): GetOwnerInfoFromLogin
    {
        $this->ownerInfo = $ownerInfo;
        return $this;
    }


}