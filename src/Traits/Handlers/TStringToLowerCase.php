<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Handlers;

trait TStringToLowerCase
{
    /**
     * Changes a string to lowercase.
     *
     * @param string $str String to be converted.
     * @return string
     */
    public static function toLowerCase(string $str): string
    {
        return mb_convert_case($str, MB_CASE_LOWER);
    }
}
