<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\Entity\ReturnedMessage;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageDownload
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:MessageDownloadResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class MessageDownload implements IResponse
{

    use DataMessageStatus;

    /**
     * @var ReturnedMessage|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\ReturnedMessage")
     * @Serializer\SerializedName("p:dmReturnedMessage")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $returnedMessage;

    /**
     * @return ReturnedMessage|null
     */
    public function getReturnedMessage(): ?ReturnedMessage
    {
        return $this->returnedMessage;
    }

    /**
     * @param ReturnedMessage|null $returnedMessage
     * @return MessageDownload
     */
    public function setReturnedMessage(?ReturnedMessage $returnedMessage): MessageDownload
    {
        $this->returnedMessage = $returnedMessage;
        return $this;
    }


}