<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringContains
{
    /**
     * Checks if a substring is contained in another string
     *
     * @param string $haystack The string to search in.
     * @param string $needle The substring to search for in the `haystack`.
     * @param bool $caseSensitive Should be case sensitive? default `true`
     * @return bool
     */
    public static function contains(string $haystack, string $needle, bool $caseSensitive = true): bool
    {
        if ($caseSensitive === false) {
            $haystack = mb_strtolower($haystack);
            $needle = mb_strtolower($needle);
        }

        return str_contains($haystack, $needle);
    }
}
