<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsNumeric
{
    /**
     * Validates if a string have only numeric characters.
     *
     * @param string $str String to be validated.
     * @param bool $includePonctuation If `true` includes US numbers ponctuation.
     * @return bool
     */
    public static function isNumeric(string $str, bool $includePonctuation = false): bool
    {
        $pattern = $includePonctuation ? '/^-?(\d+|\d{1,3}(,\d{3})*)(\.\d+)?$/' : '/^-?[0-9]+$/';

        $match = preg_match($pattern, $str);

        if ($match === 0 || $match === false) {
            return false;
        }

        return true;
    }
}
