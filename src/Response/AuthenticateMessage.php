<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;

use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ChangeISDSPassword
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:AuthenticateMessageResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class AuthenticateMessage implements IResponse
{
    use DataMessageStatus;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("p:dmAuthResult")
     */
    protected $authenticated;

    /**
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return $this->authenticated;
    }

    /**
     * @param bool $authenticated
     * @return AuthenticateMessage
     */
    public function setAuthenticated(bool $authenticated): AuthenticateMessage
    {
        $this->authenticated = $authenticated;
        return $this;
    }


}