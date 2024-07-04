<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsSemVer
{
    /**
     * Validates whether a version number follow the rules of semantic versioning [(SemVer)](https://semver.org).
     *
     * @param string $version
     * @return bool
     */
    public static function isSemVer(string $version): bool
    {
        $pattern = "/^(?P<major>0|[1-9]\d*)\.(?P<minor>0|[1-9]\d*)\.(?P<patch>0|[1-9]\d*)(?:-(?P<prerelease>(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+(?P<buildmetadata>[0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/";

        $match = preg_match($pattern, $version);

        if ($match === 0 || $match === false) {
            return false;
        }

        return true;
    }
}
