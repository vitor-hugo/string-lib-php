<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringMaxVersion
{
    /**
     * Checks if a version number is lesser or equal to a given one.
     * This function validates version numbers that have only numbers sepatared by periods (.).
     *
     * E.g.
     *  - Valid: '8.3.8', '5.0', '3.22.2', '10', '126.0.6478.63' ...
     *  - Invalid: '2.0.0-rc.1', '1.0.0-beta' ...
     *
     * @param string $version Version to be validated
     * @param string $maxVersion Maximum acceptable version
     * @return bool
     */
    public static function maxVersion(string $version, string $maxVersion): bool
    {
        $pattern = '/^[0-9\.]{1,}$/';
        if (preg_match($pattern, $version) == false || @preg_match($pattern, $maxVersion) == false) {
            return false;
        }

        if ($version === $maxVersion) {
            return true;
        }

        return self::validateVersionsParts($version, $maxVersion);
    }


    private static function validateVersionsParts(string $version, string $maxVersion): bool
    {
        $verNumbers = explode('.', $version);
        $reqNumbers = explode('.', $maxVersion);

        $counter = max(count($verNumbers), count($reqNumbers));

        for ($i = 0; $i < $counter; $i++) {
            $ver = (int) ($verNumbers[$i] ?? 0);
            $req = (int) ($reqNumbers[$i] ?? 0);

            $isLastNumber = $i === $counter - 1;

            if ($ver === $req && $isLastNumber) {
                return true;
            } else if ($ver === $req && !$isLastNumber) {
                continue;
            } else if ($ver < $req) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
