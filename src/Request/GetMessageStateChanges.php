<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetMessageStateChanges
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetMessageStateChanges",namespace="http://isds.czechpoint.cz/v20")
 */
class GetMessageStateChanges implements IRequest
{
    /**
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmFromTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $changesFrom;
    /**
     * @var \DateTime|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:dmToTime")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $changesTo;

    /**
     * @return \DateTime|null
     */
    public function getChangesFrom(): ?\DateTime
    {
        return $this->changesFrom;
    }

    /**
     * @param \DateTime|null $changesFrom
     * @return GetMessageStateChanges
     */
    public function setChangesFrom(?\DateTime $changesFrom): GetMessageStateChanges
    {
        $this->changesFrom = $changesFrom;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getChangesTo(): ?\DateTime
    {
        return $this->changesTo;
    }

    /**
     * @param \DateTime|null $changesTo
     * @return GetMessageStateChanges
     */
    public function setChangesTo(?\DateTime $changesTo): GetMessageStateChanges
    {
        $this->changesTo = $changesTo;
        return $this;
    }


}