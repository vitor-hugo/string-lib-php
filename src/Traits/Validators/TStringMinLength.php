<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringMinLength
{
    /**
     * Validates if the length of a string is greater than or equal to a minimum parameter.
     *
     * @param string $str String to be validated.
     * @param int $min Minimum acceptable length. Must be >= 0.
     * @return bool
     */
    public function minLength(string $str, int $min): bool
    {
        $len = mb_strlen($str);
        $min = $min < 1 ? 1 : $min;
        return $len >= $min;
    }
}
