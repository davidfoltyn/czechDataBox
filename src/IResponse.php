<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox;

/**
 * @phpstan-template TStatusClass
 */
abstract class IResponse
{

    /**
     * @return TStatusClass
     */
    abstract public function getStatus();
}
