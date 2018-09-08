<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\DataBoxId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CheckDataBox
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:CheckDataBox",namespace="http://isds.czechpoint.cz/v20")
 */
class CheckDataBox implements IRequest
{
    use DataBoxId;

    /**
     * @var bool|null
     * @Serializer\Type("booL")
     * @Serializer\SerializedName("p:dbApproved")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    protected $approved;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbExternRefNumber")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    protected $externalRefNumber;

    /**
     * @return bool|null
     */
    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    /**
     * @param bool|null $approved
     * @return CheckDataBox
     */
    public function setApproved(?bool $approved): CheckDataBox
    {
        $this->approved = $approved;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExternalRefNumber(): ?string
    {
        return $this->externalRefNumber;
    }

    /**
     * @param null|string $externalRefNumber
     * @return CheckDataBox
     */
    public function setExternalRefNumber(?string $externalRefNumber): CheckDataBox
    {
        $this->externalRefNumber = $externalRefNumber;
        return $this;
    }

}