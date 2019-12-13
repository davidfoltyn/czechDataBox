<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\Entity\PersonalOwnerInfo;
use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class FindPersonalDataBox
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:FindPersonalDataBox",namespace="http://isds.czechpoint.cz/v20")
 */
class FindPersonalDataBox implements IRequest
{
    /**
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\PersonalOwnerInfo")
     * @Serializer\SerializedName("p:dbOwnerInfo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected PersonalOwnerInfo $ownerInfo;

    public function getOwnerInfo(): PersonalOwnerInfo
    {
        return $this->ownerInfo;
    }

    public function setOwnerInfo(PersonalOwnerInfo $ownerInfo): FindPersonalDataBox
    {
        $this->ownerInfo = $ownerInfo;
        return $this;
    }


}