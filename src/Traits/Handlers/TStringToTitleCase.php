<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Handlers;

trait TStringToTitleCase
{
    /**
     * Changes the case of a string to title case,
     * fixing or not roman numerals and portuguese prepositions.
     *
     * @param string $str
     * @param bool $fixRomanNumerals Keep roman numerals uppercased (up to 6 digits)
     * @param bool $fixPortuguesePrepositions Keep portuguese prepositions in lowercase
     * @return string
     */
    public static function toTitleCase(
        string $str,
        bool $fixRomanNumerals = false,
        bool $fixPortuguesePrepositions = false
    ): string {

        if ($fixRomanNumerals) {
            $str = self::markRomanNumerals($str);
        }

        $str = mb_convert_case($str, MB_CASE_TITLE);

        if ($fixPortuguesePrepositions) {
            $str = self::normalizePortuguesePrepositions($str);
        }

        if ($fixRomanNumerals) {
            $str = self::normalizeRomanNumerals($str);
        }

        return $str;
    }


    /**
     * Marks all roman numerals on a string to be normalized after.
     *
     * @param string $value
     * @return string
     */
    private static function markRomanNumerals(string $value): string
    {
        $value = mb_strtoupper($value);

        $value = preg_replace_callback(
            '/\b(M{1,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})|M{0,4}(CM|C?D|D?C{1,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})|M{0,4}(CM|CD|D?C{0,3})(XC|X?L|L?X{1,3})(IX|IV|V?I{0,3})|M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|I?V|V?I{1,3}))\b/',
            function ($matches) {
                return "{" . $matches[0] . "}";
            },
            $value
        );

        return $value;
    }


    /**
     * Normalizes all portuguese prepositions.
     * In portuguese prepositions should not be capitalized.
     *
     * @param string $value
     * @return string
     */
    private static function normalizePortuguesePrepositions(string $value): string
    {
        $value = preg_replace_callback(
            '/\s[DE]+[aeious]{0,2}\b/',
            function ($matches) {
                return mb_strtolower($matches[0]);
            },
            $value
        );

        return $value;
    }


    /**
     * Normalizes the roman numerals marked before.
     *
     * @param string $value
     * @return string
     */
    private static function normalizeRomanNumerals(string $value): string
    {
        // Fix the Roman numerals separated before
        $value = preg_replace_callback(
            '/\{+[IVXLCDMivxlcdm]{1,5}+\}/',
            function ($matches) {
                $final = str_replace("{", "", $matches[0]);
                $final = str_replace("}", "", $final);
                return mb_strtoupper($final);
            },
            $value
        );

        return $value;
    }
}
