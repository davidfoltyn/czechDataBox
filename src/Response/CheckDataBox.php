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
 * Class FindDataBox
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:FindDataBoxResponse", namespace="http://isds.czechpoint.cz/v20")
 * @phpstan-extends IResponse<\HelpPC\CzechDataBox\Entity\DataBoxStatus>
 */
class CheckDataBox extends IResponse
{
    use DataBoxStatus;
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:dbState")
     * @Serializer\XmlElement(cdata=false)
     */
    protected ?int $state = null;

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(?int $state): CheckDataBox
    {
        $this->state = $state;
        return $this;
    }


}