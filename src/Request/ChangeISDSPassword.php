<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;

use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;
use Nette\Utils\Strings;

/**
 * Class ChangeISDSPassword
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ChangeISDSPassword",namespace="http://isds.czechpoint.cz/v20")
 */
class ChangeISDSPassword implements IRequest
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbOldPassword")
     * @Serializer\XmlElement(cdata=false)
     */
    protected string $oldPassword;
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dbNewPassword")
     * @Serializer\XmlElement(cdata=false)
     */
    protected string $newPassword;

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): ChangeISDSPassword
    {
        $this->oldPassword = $oldPassword;
        return $this;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword): ChangeISDSPassword
    {
        $pwdLen = mb_strlen($newPassword);
        if (
            $pwdLen < 8 ||
            $pwdLen > 32 ||
            preg_match("/^[a-z0-9\!\#\$\*\%\&\(\)\*\+\,\-\:\=\?\@\[\]\_\{\|\}\~]+$/i", $newPassword) == FALSE ||
            preg_match('/[A-Z]/', $newPassword) == FALSE ||
            preg_match('/[a-z]/', $newPassword) == FALSE ||
            preg_match('/[0-9]/', $newPassword) == FALSE ||
            in_array(\mb_substr($newPassword, 0, 5), ['qwert', 'asdgf']) ||
            \mb_substr($newPassword, 0, 6) === '123456'
        ) {
            throw new \Exception('Password does not meet the requirements. Password must be between 8 and 32 chars and may not start with the following values "qwert", "asdgf", "123456". ');
        }

        $this->newPassword = $newPassword;
        return $this;
    }


}