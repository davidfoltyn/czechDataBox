<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait QTimestamp
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmQTimestamp")
     */
    protected string $qTimestamp;
}