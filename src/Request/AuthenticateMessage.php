<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetSignedDeliveryInfo
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:AuthenticateMessage",namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessType("public_method")
 */
class AuthenticateMessage implements IRequest
{

    /**
     * @Serializer\Type("base64File")
     * @Serializer\SerializedName("p:dmMessage")
     * @Serializer\XmlElement(cdata=false)
     */
    protected SplFileInfo $dataMessage;

    public function getDataMessage(): SplFileInfo
    {
        return $this->dataMessage;
    }

    public function setDataMessage(SplFileInfo $dataMessage): AuthenticateMessage
    {
        $this->dataMessage = $dataMessage;
        return $this;
    }


}