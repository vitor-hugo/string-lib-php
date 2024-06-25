<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Handlers;

trait TStringToString
{
    /**
     * Tries to convert any value type to string.
     *
     * @param mixed $value
     * @param string $arraySeparator a separator in case the value is an array.
     * @return string|false A `string` in case of success and `false` in case of fail.
     */
    public static function toString(mixed $value, string $arraySeparator = ''): string|false
    {
        $type = gettype($value);

        switch ($type) {
            case 'string':
                return $value;

            case 'integer':
            case 'double':
            case 'float':
                return (string) $value;

            case 'boolean':
                return $value ? 'true' : 'false';

            case 'array':
                return implode($arraySeparator, $value);

            case 'object':
                return self::convertObjectToString($value);

            case 'resource':
                return self::convertResourceToString($value);

            case 'NULL':
            case 'null':
            case 'unknown type':
                return '';

            default:
                return false;
        }
    }


    private static function convertObjectToString($object): string|false
    {
        if (method_exists($object, '__toString')) {
            return @strval($object);
        }
        return false;
    }


    private static function convertResourceToString($resource): string|false
    {
        try {
            $content = stream_get_contents($resource);
        } catch (\Throwable $th) {
            return false;
        }

        return $content;
    }
}
