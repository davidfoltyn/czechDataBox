<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class DataBoxCreditInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:DataBoxCreditInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class DataBoxCreditInfo implements IResponse
{
    use DataBoxStatus;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SkipWhenEmpty
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:currentCredit")
     */
    protected $currentCredit;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:notifEmail")
     */
    protected $notifyEmail;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\CreditRecord>")
     * @Serializer\XmlList(entry="ciRecord", inline=false, namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("ciRecords")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $records;

    public function __construct()
    {
        $this->records = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getCurrentCredit(): ?int
    {
        return $this->currentCredit;
    }

    /**
     * @return null|string
     */
    public function getNotifyEmail(): ?string
    {
        return $this->notifyEmail;
    }

    /**
     * @return ArrayCollection
     */
    public function getRecords(): ArrayCollection
    {
        return $this->records;
    }


}