<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\Dummy;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class GetUserInfoFromLogin
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:GetUserInfoFromLogin",namespace="http://isds.czechpoint.cz/v20")
 */
class GetUserInfoFromLogin implements IRequest
{
    use Dummy;

}