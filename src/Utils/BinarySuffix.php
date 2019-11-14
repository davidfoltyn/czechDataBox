<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Utils;


class BinarySuffix
{
    const CONVERT_THRESHOLD = 1024;
    /**
     * @var int
     */
    private $number;
    /**
     * @var string
     */
    private $locale;
    /**
     * @var array
     */
    private $binaryPrefixes = [
        1125899906842624 => '%d PB',
        1099511627776 => '%d TB',
        1073741824 => '%d GB',
        1048576 => '%d MB',
        1024 => '%d kB',
        0 => '%d bytes',
    ];

    /**
     * @param int $number
     * @param string $locale
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(int $number, $locale = 'en')
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Binary suffix converter accept only numeric values.');
        }
        $this->number = $number;
        $this->locale = $locale;
        /*
         * Workaround for 32-bit systems which ignore array ordering when
         * dropping values over 2^32-1
         */
        krsort($this->binaryPrefixes);
    }

    public static function convert($number, $locale = 'cs')
    {
        $obj = new static($number, $locale);
        return $obj->doConvert();
    }

    public function doConvert()
    {
        if ($this->number < 0) {
            return $this->number;
        }
        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size <= $this->number) {
                $value = ($this->number >= self::CONVERT_THRESHOLD) ? $this->number / (double) $size : $this->number;

                return sprintf($unitPattern, $value);
            }
        }
        return $this->number;
    }
}