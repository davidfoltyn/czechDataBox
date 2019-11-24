<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\CzechDataBox\Traits\DataMessageEnvelope;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageEnvelope
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmDm")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class MessageEnvelope
{
    use DataMessageEnvelope;
}