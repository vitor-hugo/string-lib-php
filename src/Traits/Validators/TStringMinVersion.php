<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringMinVersion
{
    /**
     * Checks if a version number is equal or greater to a given one.
     * This function validates version numbers that have only numbers sepatared by periods (.).
     *
     * E.g.
     *  - Valid: '8.3.8', '5.0', '3.22.2', '10', '126.0.6478.63' ...
     *  - Invalid: '2.0.0-rc.1', '1.0.0-beta' ...
     * @param string $version Version to be validated
     * @param string $required Minimum required version
     * @return bool
     */
    protected static function minVersion(string $version, string $required): bool
    {
        $pattern = '/^[0-9\.]{1,}$/';
        if (preg_match($pattern, $version) == false || @preg_match($pattern, $required) == false) {
            return false;
        }

        if ($version === $required) {
            return true;
        }

        return self::validateVersionsParts($version, $required);
    }


    private static function validateVersionsParts(string $version, string $required): bool
    {
        $verNumbers = explode('.', $version);
        $reqNumbers = explode('.', $required);

        $counter = max(count($verNumbers), count($reqNumbers));

        for ($i = 0; $i < $counter; $i++) {
            $ver = (int) ($verNumbers[$i] ?? -1);
            $req = (int) ($reqNumbers[$i] ?? -1);

            if ($ver === $req) {
                continue;
            } else if ($ver > $req) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
