<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ConfirmDelivery
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ConfirmDeliveryResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class ConfirmDelivery extends IResponse
{

	use DataMessageStatus;

}
