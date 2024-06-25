<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsLength
{
    /**
     * Validates if the length of a string is between the minimum and maximum parameters.
     *
     * If the minimum size is greater than the maximum, the values ​​will be swapped.
     *
     * @param string $str String to be validated.
     * @param int $min Minimum acceptable length. Must be >= 0.
     * @param int $max Maximum accpetable length. Must be >= 1.
     * @return bool
     */
    protected function isLength(string $str, int $min, int $max): bool
    {
        $len = mb_strlen($str);

        $min = $min < 0 ? 0 : $min;
        $max = $max < 1 ? 1 : $max;

        if ($min > $max) {
            $swap = $min;
            $min = $max;
            $max = $swap;
            unset($swap);
        }

        if ($len < $min || $len > $max) {
            return false;
        }

        return true;
    }
}
