<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\Entity\OwnerInfo;
use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class FindDataBox
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:FindDataBox",namespace="http://isds.czechpoint.cz/v20")
 */
class FindDataBox implements IRequest
{
    /**
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\OwnerInfo")
     * @Serializer\SerializedName("p:dbOwnerInfo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected OwnerInfo $ownerInfo;

    public function getOwnerInfo(): OwnerInfo
    {
        return $this->ownerInfo;
    }

    public function setOwnerInfo(OwnerInfo $ownerInfo): FindDataBox
    {
        $this->ownerInfo = $ownerInfo;
        return $this;
    }


}