<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Handlers;

trait TStringToUpperCase
{
    /**
     * Changes the case of a string to uppercase
     *
     * @param string $str String to be converted.
     * @return string
     */
    public static function toUpperCase(string $str): string
    {
        return mb_convert_case($str, MB_CASE_UPPER);
    }
}
