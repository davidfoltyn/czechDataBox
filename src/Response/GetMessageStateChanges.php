<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetMessageStateChanges
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetMessageStateChangesResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetMessageStateChanges implements IResponse
{
    use DataMessageStatus;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\StateChangeRecord>")
     * @Serializer\XmlList(entry="dmRecord", inline=false)
     * @Serializer\SerializedName("p:dmRecords")
     */
    protected $record;


}