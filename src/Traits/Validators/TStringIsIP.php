<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsIP
{
    /**
     * Validates whether a string is a valid IP V4 or V6.
     *
     * @param string $ip Base64 string to be validated
     * @param int $version 4 or 6, if none tries both
     * @return bool
     */
    public static function isIP(string $ip, ?int $version = null): bool
    {
        if ($version == null || ($version != 4 && $version != 6)) {
            return self::isIP($ip, 4) || self::isIP($ip, 6);
        }

        $IPv4SegmentFormat = '(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])';
        $IPv4AddressFormat = "({$IPv4SegmentFormat}[.]){3}{$IPv4SegmentFormat}";
        $IPv4AddressRegExp = "^{$IPv4AddressFormat}$";

        $IPv6SegmentFormat = '(?:[0-9a-fA-F]{1,4})';
        $IPv6AddressRegExp = '^(' .
            "(?:{$IPv6SegmentFormat}:){7}(?:{$IPv6SegmentFormat}|:)|" .
            "(?:{$IPv6SegmentFormat}:){6}(?:{$IPv4AddressFormat}|:{$IPv6SegmentFormat}|:)|" .
            "(?:{$IPv6SegmentFormat}:){5}(?::{$IPv4AddressFormat}|(:{$IPv6SegmentFormat}){1,2}|:)|" .
            "(?:{$IPv6SegmentFormat}:){4}(?:(:{$IPv6SegmentFormat}){0,1}:{$IPv4AddressFormat}|(:{$IPv6SegmentFormat}){1,3}|:)|" .
            "(?:{$IPv6SegmentFormat}:){3}(?:(:{$IPv6SegmentFormat}){0,2}:{$IPv4AddressFormat}|(:{$IPv6SegmentFormat}){1,4}|:)|" .
            "(?:{$IPv6SegmentFormat}:){2}(?:(:{$IPv6SegmentFormat}){0,3}:{$IPv4AddressFormat}|(:{$IPv6SegmentFormat}){1,5}|:)|" .
            "(?:{$IPv6SegmentFormat}:){1}(?:(:{$IPv6SegmentFormat}){0,4}:{$IPv4AddressFormat}|(:{$IPv6SegmentFormat}){1,6}|:)|" .
            "(?::((?::{$IPv6SegmentFormat}){0,5}:{$IPv4AddressFormat}|(?::{$IPv6SegmentFormat}){1,7}|:))" .
            ')(%[0-9a-zA-Z-.:]{1,})?$';

        if ($version === 4) {
            $pattern = "/$IPv4AddressRegExp/";
        }

        if ($version === 6) {
            $pattern = "/$IPv6AddressRegExp/";
        }

        $match = preg_match_all($pattern, $ip);

        if ($match !== false && $match !== 0) {
            return true;
        }

        return false;
    }
}
