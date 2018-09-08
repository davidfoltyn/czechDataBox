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
    private $binaryPrefixes = array(
        1125899906842624 => '%d PB',
        1099511627776 => '%d TB',
        1073741824 => '%d GB',
        1048576 => '%d MB',
        1024 => '%d kB',
        0 => '%d bytes',
    );

    /**
     * @param int $number
     * @param string $locale
     * @param int $precision
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, $locale = 'en', $precision = null)
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Binary suffix converter accept only numeric values.');
        }
        if (!is_null($precision)) {
            $this->setSpecificPrecisionFormat($precision);
        }
        $this->number = (int)$number;
        $this->locale = $locale;
        /*
         * Workaround for 32-bit systems which ignore array ordering when
         * dropping values over 2^32-1
         */
        krsort($this->binaryPrefixes);
    }

    public static function convert($number, $precision = null, $locale = 'cs')
    {
        $obj = new static($number, $locale, $precision);
        return $obj->doConvert();
    }

    public function doConvert()
    {
        if ($this->number < 0) {
            return $this->number;
        }
        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size <= $this->number) {
                $value = ($this->number >= self::CONVERT_THRESHOLD) ? $this->number / (double)$size : $this->number;

                return sprintf($unitPattern, $value);
            }
        }
        return $this->number;
    }

    /**
     * Replaces the default ICU 56.1 decimal formats defined in $binaryPrefixes with ones that provide the same symbols
     * but the provided number of decimal places.
     *
     * @param int $precision
     *
     * @throws \InvalidArgumentException
     */
    protected function setSpecificPrecisionFormat($precision)
    {
        if ($precision < 0) {
            throw new \InvalidArgumentException('Precision must be positive');
        }
        if ($precision > 3) {
            throw new \InvalidArgumentException('Invalid precision. Binary suffix converter can only represent values in ' .
                'up to three decimal places');
        }
        $icuFormat = '#';
        if ($precision > 0) {
            $icuFormat .= str_pad('#.', (2 + $precision), '0');
        }
        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size >= 1024) {
                $symbol = substr($unitPattern, strpos($unitPattern, ' '));
                $this->binaryPrefixes[$size] = $icuFormat . $symbol;
            }
        }
    }
}