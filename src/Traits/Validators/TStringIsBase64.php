<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsBase64
{
    /**
     * Validates whether a string is in Base64 format.
     *
     * @param string $base64 Base64 string to be validated
     * @return bool
     */
    protected static function isBase64(string $base64): bool
    {
        $base64 = self::normalizeBase64String($base64);
        return base64_decode($base64, true) !== false;
    }


    private static function normalizeBase64String(string $base64): string
    {
        $len = strlen($base64) % 4;

        if ($len) {
            $pad = 4 - $len;
            $base64 .= str_repeat("=", $pad);
        }

        $base64 = strtr($base64, "-_", "+/");

        return $base64;
    }
}
