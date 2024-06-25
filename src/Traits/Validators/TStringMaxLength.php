<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringMaxLength
{
    /**
     * Validates if the length of a string is lesser than or equal to a maximum parameter.
     *
     * @param string $str String to be validated.
     * @param int $max Maximum accpetable length. Must be >= 1.
     * @return bool
     */
    protected function maxLength(string $str, int $max): bool
    {
        $len = mb_strlen($str);
        $max = $max < 1 ? 1 : $max;
        return $len <= $max;
    }
}
