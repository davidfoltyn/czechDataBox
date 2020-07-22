<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use HelpPC\CzechDataBox\Traits\Signature;
use JMS\Serializer\Annotation as Serializer;

/**
 * todo order
 * Class GetSignedDeliveryInfo
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetSignedDeliveryInfoResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetSignedDeliveryInfo extends IResponse
{

	use DataMessageStatus;
	use Signature;

}
