<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataBoxStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetUserInfoFromLogin
 *
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetUserInfoFromLoginResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class GetUserInfoFromLogin extends IResponse
{

	use DataBoxStatus;

	/**
	 * @Serializer\SkipWhenEmpty
	 * @Serializer\Type("string")
	 * @Serializer\SerializedName("p:dbUserInfo")
	 * @Serializer\XmlElement(cdata=false)
	 */
	protected ?string $userInfo = null;

}
