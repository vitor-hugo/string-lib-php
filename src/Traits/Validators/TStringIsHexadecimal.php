<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsHexadecimal
{
    /**
     * Validates if a string is a hexadecimal number.
     *
     * @param string $hex String to be validated
     * @return bool
     */
    public static function isHexadecimal(string $hex, bool $onlyUppercase = false): bool
    {
        $pattern = "/^(0x)?[a-fA-F0-9]+$/";
        $match = preg_match($pattern, $hex);
        return $match == 1;
    }
}
