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
     * @var \DateTimeImmutable|null
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:pswExpDate")
     */
    protected $passwordExpiry;

    /**
     * @return \DateTimeImmutable|null
     */
    public function getPasswordExpiry(): ?\DateTimeImmutable
    {
        return $this->passwordExpiry;
    }

    /**
     * @param \DateTimeImmutable|null $passwordExpiry
     * @return GetPasswordInfo
     */
    public function setPasswordExpiry(?\DateTimeImmutable $passwordExpiry): GetPasswordInfo
    {
        $this->passwordExpiry = $passwordExpiry;
        return $this;
    }


}