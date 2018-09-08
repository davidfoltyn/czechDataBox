<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use JMS\Serializer\Annotation as Serializer;

/**
 * Class CreditRecord
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ciRecord")
 */
class CreditRecord
{
    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciEventTime")
     */
    protected $eventTime;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciEventType")
     */
    protected $eventType;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciCreditChange")
     */
    protected $creditChange;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciCreditAfter")
     */
    protected $creditAfter;

    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciTransID")
     */
    protected $transID;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciRecipientID")
     */
    protected $recipientID;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:ciPDZID")
     */
    protected $PDZID;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciNewCapacity")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $newCapacity;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciNewFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $newFrom;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciNewTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $newTo;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciOldCapacity")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $oldCapacity;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciOldFrom")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $oldFrom;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciOldTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $oldTo;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     * @Serializer\SerializedName("p:ciDoneBy")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $doneBy;
}