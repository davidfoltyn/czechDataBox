<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use HelpPC\CzechDataBox\Traits\DataMessageId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class StateChangeRecord
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmRecord")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class StateChangeRecord
{
    use DataMessageId;
    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmEventTime")
     */
    protected $eventTime;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmMessageStatus")
     */
    protected $messageStatus;

    /**
     * @return \DateTime
     */
    public function getEventTime(): \DateTime
    {
        return $this->eventTime;
    }

    /**
     * @param \DateTime $eventTime
     * @return StateChangeRecord
     */
    public function setEventTime(\DateTime $eventTime): StateChangeRecord
    {
        $this->eventTime = $eventTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageStatus(): int
    {
        return $this->messageStatus;
    }

    /**
     * @param int $messageStatus
     * @return StateChangeRecord
     */
    public function setMessageStatus(int $messageStatus): StateChangeRecord
    {
        $this->messageStatus = $messageStatus;
        return $this;
    }

}