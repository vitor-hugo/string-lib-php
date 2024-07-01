<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

use Torugo\TString\Options\UrlOptions;

trait TStringIsUrl
{
    use TStringIsIP;
    use TStringIsFQDN;

    /**
     * Validates if a string has a valid url structure.
     *
     * @param string $email URL to be validated.
     * @return bool
     */
    public static function isUrl(string $url, ?UrlOptions $options = null): bool
    {
        if ($options == null) {
            $options = new UrlOptions;
        }

        if (preg_match('/[\s<>\\\]/', $url)) {
            return false;
        }

        if (strpos($url, "mailto:") === 0) {
            return false;
        }

        if ($options->validateLength && strlen($url) > 2083) {
            return false;
        }

        if (!$options->allowFragments && str_contains($url, "#")) {
            return false;
        }

        if (!$options->allowQueryComponents && (str_contains($url, "?") || str_contains($url, "&"))) {
            return false;
        }

        $split = explode("#", $url);
        $url = array_shift($split);

        $split = explode("?", $url);
        $url = array_shift($split);

        $split = explode("://", $url);
        if (count($split) > 1) {
            $protocol = mb_strtolower(array_shift($split));
            if ($options->requireValidProtocol && !in_array($protocol, $options->protocols)) {
                return false;
            }
        } else if ($options->requireProtocol) {
            return false;
        } else if (substr($url, 0, 2) === "//") {
            if (!$options->allowProtocolRelativeUrls) {
                return false;
            }
            $split[0] = substr($url, 2);
        }
        $url = implode("://", $split);

        if ($url === "") {
            return false;
        }

        $split = explode("/", $url);
        $url = array_shift($split);

        if ($url === "" && !$options->requireHost) {
            echo "::0:: $url \n";
            return true;
        }

        $split = explode("@", $url);
        if (count($split) > 1) {
            if (!$options->allowAuth) {
                return false;
            }

            if ($split[0] === '') {
                return false;
            }

            $auth = array_shift($split);
            if (strpos($auth, ":") >= 0 && count(explode(":", $auth)) > 2) {
                return false;
            }

            [$user, $password] = explode(":", $auth);
            if ($user === "" && $password == "") {
                return false;
            }
        }

        $hostname = implode("@", $split);
        $portStr = null;
        $ipv6 = null;
        $host = null;

        $ipv6Pattern = "/^\[([^\]]+)\](?::([0-9]+))?$/";
        preg_match($ipv6Pattern, $hostname, $ipv6Match);

        if ($ipv6Match) {
            $host = "";
            $ipv6 = $ipv6Match[1];
            $portStr = $ipv6Match[2] ?? null;
        } else {
            $split = explode(":", $hostname);
            $host = array_shift($split);
            if (count($split)) {
                $portStr = implode(":", $split);
            }
        }

        if ($portStr !== null && mb_strlen($portStr) > 0) {
            $port = (int) $portStr;
            if (!preg_match("/^[0-9]+$/", $portStr) || $port <= 0 || $port > 65535) {
                return false;
            }
        } else if ($options->requirePort) {
            return false;
        }

        if ($host === '' && !$options->requireHost) {
            return true;
        }

        if (!self::isIP($host) && !self::isFQDN($host, $options) && (!$ipv6 || !self::isIP($ipv6, 6))) {
            return false;
        }

        return true;
    }
}
