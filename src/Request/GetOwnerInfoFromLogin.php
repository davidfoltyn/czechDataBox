<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\Dummy;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetOwnerInfoFromLogin
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetOwnerInfoFromLogin",namespace="http://isds.czechpoint.cz/v20")
 */
class GetOwnerInfoFromLogin implements IRequest
{

	use Dummy;

}
