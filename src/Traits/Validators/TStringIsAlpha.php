<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsAlpha
{
    /**
     * Validates if a string have only alphabetical characters.
     *
     * @param string $value String to be validated
     * @param bool $includeUnicode Includes some unicode alphabet chars like accented letters. (default false)
     * @return bool
     */
    public static function isAlpha(string $value, bool $includeUnicode = false): bool
    {
        $pattern = $includeUnicode ? "/^[\p{L}]+$/u" : "/^[a-zA-Z]+$/";
        return preg_match($pattern, $value) > 0;
    }
}
