<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Utils;


use HelpPC\CzechDataBox\Exception\InputNotValid;
use Nette\Utils\Strings;
use Nette\Utils\Validators;

class Validator extends Validators
{

    public static function isValidDataBoxId(string $dataBoxId)
    {//todo dle popisu je to spravne, ale z nejakyho duvodu to ne vzdy sedi
        $charCount = 7;
        $mapString = 'abcdefghijkmnpqrstuvwxyz23456789';
        if (Strings::length($dataBoxId) !== $charCount) {
            throw new InputNotValid(sprintf('DataBoxId "%s" have less char. Required is %d char.', $dataBoxId, $charCount));
        }
        $checkChar = Strings::substring($dataBoxId, -1);
        $checkId = Strings::substring($dataBoxId, 0, -1);
        $tmp = null;
        $splittedDataBoxId = str_split($checkId);
        foreach ($splittedDataBoxId as $charIndex => $char) {
            $int = strpos($mapString, $char);
            $charIndex = Strings::indexOf($mapString, $char);
            if (($charIndex % 2) > 0) {
                $int *= 2;
            }
            $restOfTheDivision = null;
            $value = null;
            if ($int > 0) {
                $value = round($int / 32);
                $restOfTheDivision = $int % 32;
                $int = $value + $restOfTheDivision;
            }
            $tmp += $int;
        }

        $restOfTheDivision = $tmp % 32;
        if ($restOfTheDivision > 0) {
            $restOfTheDivision = 32 - $restOfTheDivision;
        }
        if ($mapString[$restOfTheDivision] !== $checkChar) {
            throw new InputNotValid(sprintf('Luhn algoritmh is not valid for DataBoxId "%s"', $dataBoxId));
        }
        return true;
    }
}