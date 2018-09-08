<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetPasswordInfo
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetPasswordInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetPasswordInfo implements IResponse
{
    use DataBoxStatus;

    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:pswExpDate")
     */
    protected $passwordExpiry;

    /**
     * @return \DateTime|null
     */
    public function getPasswordExpiry(): ?\DateTime
    {
        return $this->passwordExpiry;
    }

    /**
     * @param \DateTime|null $passwordExpiry
     * @return GetPasswordInfo
     */
    public function setPasswordExpiry(?\DateTime $passwordExpiry): GetPasswordInfo
    {
        $this->passwordExpiry = $passwordExpiry;
        return $this;
    }


}