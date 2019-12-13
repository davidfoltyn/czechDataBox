<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\Entity\DataMessageId;
use HelpPC\CzechDataBox\Entity\Hash;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class VerifyMessage
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:VerifyMessageResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataMessageStatus>
 */
class VerifyMessage extends IResponse
{
    use DataMessageStatus;

    /**
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\Hash")
     * @Serializer\SerializedName("p:dmHash")
     * @Serializer\XmlElement(cdata=false)
     */
    protected Hash $hash;

    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): VerifyMessage
    {
        $this->status = $status;
        return $this;
    }

    public function getHash(): Hash
    {
        return $this->hash;
    }

    public function setHash(Hash $hash): VerifyMessage
    {
        $this->hash = $hash;
        return $this;
    }


}