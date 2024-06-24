<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsAlphanumeric
{
    /**
     * Validates if a string have only alphanumeric characters.
     *
     * @param string $value String to be validated
     * @param bool $unicode Includes some unicode alphabet chars like accented letters. (default false)
     * @return bool
     */
    public static function isAlphanumeric(string $value, bool $unicode = false): bool
    {
        $pattern = $unicode ? "/^[\p{L}0-9]+$/u" : "/^[a-zA-Z0-9]+$/";
        return preg_match($pattern, $value) > 0;
    }
}
