<?php

declare(strict_types=1);

namespace Xact\Cast;

use DateTime;
use InvalidArgumentException;

class Cast
{
    /**
     * Convert to ?int
     */
    public static function nullInt(mixed $var): ?int
    {
        return ($var === null || $var === '' ? null : self::intval($var));
    }

    /**
     * Convert to ?float
     */
    public static function nullFloat(mixed $var): ?float
    {
        return ($var === null || $var === '' ? null : self::floatval($var));
    }

    /**
     * Convert to ?string
     */
    public static function nullString(mixed $var): ?string
    {
        return ($var === null ? null : self::strval($var));
    }

    /**
     * Convert to ?bool
     */
    public static function nullBool(mixed $var): ?bool
    {
        return ($var === null || $var === '' ? null : self::boolval($var));
    }

    /**
     * Convert to ?array
     * See https://www.php.net/manual/en/language.types.array.php#language.types.array.casting
     *
     * @return mixed[]
     */
    public static function nullArray(mixed $var): ?array
    {
        return ($var === null || $var === '' ? null : (array)$var);
    }

    /**
     * Convert to ?object
     * See https://www.php.net/manual/en/language.types.object.php#language.types.object.casting
     */
    public static function nullObject(mixed $var): ?object
    {
        return ($var === null || $var === '' ? null : (object)$var);
    }

    /**
     * Convert to ?DateTime
     */
    public static function nullDateTime(mixed $var): ?DateTime
    {
        return ($var === null || $var === '' ? null : new DateTime(self::strval($var)));
    }

    /**
     * Convert to a string.
     * This method accepts mixed but will throw an exception unless the supplied value is one of:
     * bool|float|int|resource|string|null
     *
     * This resolves issues when calling native strval($mixed) which will report errors in PHPSTAN.
     * See https://github.com/phpstan/phpstan/issues/9295
     *
     * @throws \InvalidArgumentException
     */
    public static function strval(mixed $var): string
    {
        if (is_bool($var) || is_float($var) || is_int($var) || is_resource($var) || is_string($var) || $var === null) {
            return (string) $var;
        }
        $type = gettype($var);
        throw new InvalidArgumentException("Expected bool|float|int|resource|string|null in call to Cast::strval but found {$type}.");
    }

    /**
     * Convert to an integer.
     * This method accepts mixed but will throw an exception unless the supplied value is one of:
     * array|bool|float|int|resource|string|null
     *
     * This resolves issues when calling native intval($mixed) which will report errors in PHPSTAN.
     * See https://github.com/phpstan/phpstan/issues/9295
     *
     * @throws \InvalidArgumentException
     */
    public static function intval(mixed $var): int
    {
        if (is_array($var) || is_bool($var) || is_float($var) || is_int($var) || is_resource($var) || is_string($var) || $var === null) {
            return (int) $var;
        }
        $type = gettype($var);
        throw new InvalidArgumentException("Expected array|bool|float|int|resource|string|null in call to Cast::intval but found {$type}.");
    }

    /**
     * Convert to a float.
     * This method accepts mixed but will throw an exception unless the supplied value is one of:
     * array|bool|float|int|string|null
     *
     * This resolves issues when calling native floatval($mixed) which will report errors in PHPSTAN.
     * See https://github.com/phpstan/phpstan/issues/9295
     *
     * @throws \InvalidArgumentException
     */
    public static function floatval(mixed $var): float
    {
        if (is_array($var) || is_bool($var) || is_float($var) || is_int($var) || is_string($var) || $var === null) {
            return (float) $var;
        }
        $type = gettype($var);
        throw new InvalidArgumentException("Expected array|bool|float|int|string|null in call to Cast::floatval but found {$type}.");
    }

    /**
     * Convert to a bool.
     * This method accepts mixed but will throw an exception unless the supplied value is one of:
     * array|bool|float|int|string|null
     *
     * @throws \InvalidArgumentException
     */
    public static function boolval(mixed $var): bool
    {
        if (is_array($var) || is_bool($var) || is_float($var) || is_int($var) || is_string($var) || $var === null) {
            return (bool) $var;
        }
        $type = gettype($var);
        throw new InvalidArgumentException("Expected array|bool|float|int|string|null in call to Cast::boolval but found {$type}.");
    }
}
