<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

use Torugo\TString\Options\FQDNOptions;
use Torugo\TString\Options\UrlOptions;

trait TStringIsFQDN
{
    /**
     * Validates if a string has a valid url structure.
     *
     * @param string $email URL to be validated.
     * @return bool
     */
    public static function isFQDN(string $str, ?UrlOptions $options = null): bool
    {
        if ($options === null) {
            $options = new UrlOptions();
        }

        /* Remove the optional trailing dot before checking validity */
        if ($options->allowTrailingDot && $str[strlen($str) - 1] === '.') {
            $str = substr($str, 0, strlen($str) - 1);
        }

        /* Remove the optional wildcard before checking validity */
        if ($options->allowWildcard === true && strpos($str, "*.") === 0) {
            $str = substr($str, 2);
        }

        $parts = explode(".", $str);
        $tld = $parts[count($parts) - 1];

        if ($options->requireTld) {
            if (count($parts) < 2) {
                return false;
            }

            $pattern = "/^([a-z\x{00A1}-\x{00A8}\x{00AA}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}]{2,}|xn[a-z0-9\-]{2,})$/iu";
            if (!$options->allowNumericTld && !preg_match($pattern, $tld)) {
                return false;
            }

            // disallow spaces
            if (preg_match("/\s/", $tld)) {
                return false;
            }
        }

        // reject numeric TLDs
        if (!$options->allowNumericTld && preg_match("/^\d+$/", $tld)) {
            return false;
        }

        foreach ($parts as $part) {
            if (strlen($part) > 63 && !$options->ignoreMaxLength) {
                return false;
            }

            if (!preg_match("/^[a-z_\x{00A1}-\x{FFFF}0-9\-]+$/iu", $part)) {
                return false;
            }

            // disallow full-width chars
            if (preg_match("/[\_\x{FF01}-\x{FF5E}]/u", $part)) {
                return false;
            }

            // disallow parts starting or ending with hyphen
            if (preg_match("/^-|-$/", $part)) {
                return false;
            }
        }

        return true;
    }
}
