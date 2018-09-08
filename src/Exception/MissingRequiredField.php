<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Exception;


class MissingRequiredField extends \Exception
{

    public function __construct(string $fieldName)
    {
        parent::__construct(sprintf('The required field \'%s\' is empty.', $fieldName));
    }

}