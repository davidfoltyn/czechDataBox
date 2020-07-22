<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\DataMessageId;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetSignedDeliveryInfo
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetSignedDeliveryInfo",namespace="http://isds.czechpoint.cz/v20")
 */
class GetSignedDeliveryInfo implements IRequest
{

	use DataMessageId;

}
