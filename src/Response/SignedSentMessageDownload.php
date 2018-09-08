<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use HelpPC\CzechDataBox\Traits\Signature;
use JMS\Serializer\Annotation as Serializer;

/**
 * todo order
 * Class SignedSentMessageDownload
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:SignedSentMessageDownloadResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class SignedSentMessageDownload implements IResponse
{

    use DataMessageStatus;
    use Signature;

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataMessageStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataMessageStatus $status
     * @return SignedSentMessageDownload
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): SignedSentMessageDownload
    {
        $this->status = $status;
        return $this;
    }

}