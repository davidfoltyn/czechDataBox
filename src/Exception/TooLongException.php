<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 08.01.2018
 * Time: 18:00
 */

namespace HelpPC\CzechDataBox\Exception;


class TooLongException extends \Exception
{
    public function __construct(string $value, int $maxChars)
    {
        parent::__construct(sprintf('The value "%s" is too long. Accepted is %d chars', $value, $maxChars));
    }

}