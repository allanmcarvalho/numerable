<?php

namespace Numerable;

use Illuminate\Support\Collection;
use InvalidArgumentException;
use NumberFormatter;

class Number
{
    protected static Collection $formatters;

    /**
     * Sum the given values.
     */
    public static function add(int|float ...$values): float|int
    {
        $result = 0;
        foreach ($values as $value) {
            $result += $value;
        }

        return $result;
    }

    /**
     * Divide the given values.
     */
    public static function divide(int|float $dividend, int|float $divisor, callable $zeroSafeCallback = null): float|int
    {
        if (floatval($divisor) === 0.0) {
            if ($zeroSafeCallback !== null) {
                return $zeroSafeCallback($dividend, $divisor);
            }
            throw new InvalidArgumentException('The divisor cannot be zero.');
        }

        return $dividend / $divisor;
    }

    /**
     * Get a new numerable object from the given number.
     */
    public static function from(Numerable|int|float|string|null $number): ?Numerable
    {
        if ($number instanceof Numerable) {
            return $number;
        }
        if (is_numeric($number)) {
            return new Numerable($number);
        }

        return null;
    }

    /**
     * Get and store a new NumberFormatter instance.
     */
    public static function getIntlFormatter(
        ?string $locale,
        int $style,
        int $places = null,
        int $precision = null,
        string $pattern = null,
    ): NumberFormatter {
        $key = "$locale::$style::$places::$precision::$pattern";
        if (empty(self::$formatters)) {
            self::$formatters = new Collection();
        }

        return self::$formatters->getOrPut($key, function () use ($locale, $style, $places, $precision, $pattern) {
            $formatter = new NumberFormatter($locale ?? config('app.locale', 'en'), $style);
            if ($places !== null) {
                $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, $places);
                $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $places);
            }
            if ($precision !== null) {
                $formatter->setAttribute(NumberFormatter::MIN_SIGNIFICANT_DIGITS, $precision);
                $formatter->setAttribute(NumberFormatter::MAX_SIGNIFICANT_DIGITS, $precision);
            }
            if ($pattern !== null) {
                $formatter->setPattern($pattern);
            }

            return $formatter;
        });
    }

    /**
     * Multiply the given values.
     */
    public static function multiply(int|float ...$values): float|int
    {
        $result = 1;
        foreach ($values as $value) {
            $result *= $value;
        }

        return $result;
    }

    /**
     * Parse the given formatted (e.g.: percentage, currency) number to a Numerable instance.
     */
    public static function parse(string $number, string $locale = null): ?Numerable
    {
        $formatter = new NumberFormatter($locale ?? config('app.locale', 'en'), NumberFormatter::DECIMAL);
        $newNumber = preg_replace('/[^0-9,.]+/', '', $number);
        $multiplier = in_array(ord(mb_substr($number, 0, 1)), [226, 45]) ? -1 : 1;

        return $newNumber === '' ? null : new Numerable($formatter->parse($newNumber) * $multiplier);
    }

    /**
     * Subtract the given values.
     */
    public static function sub(int|float $startValue = 0, int|float ...$values): float|int
    {
        $result = $startValue;
        foreach ($values as $value) {
            $result -= $value;
        }

        return $result;
    }

    /**
     * Parse the given number to a currency.
     */
    public static function toCurrency(
        int|float $value,
        string $currency = null,
        string $locale = null,
        bool $accounting = false,
        bool $useIntlCode = false,
        int $places = null,
        int $precision = null,
    ): string {
        $style = $accounting ? NumberFormatter::CURRENCY_ACCOUNTING : NumberFormatter::CURRENCY;
        $numberFormatter = self::getIntlFormatter($locale, $style, $places, $precision);
        if ($useIntlCode) {
            $pattern = trim(str_replace('¤', '¤¤', $numberFormatter->getPattern()));
            $numberFormatter = clone $numberFormatter;
            $numberFormatter->setPattern($pattern);
        }
        $currency = $currency ?? config('numerable.default_currency', 'USD');

        return $numberFormatter->formatCurrency($value, $currency);
    }

    /**
     * Parse the given number to a float type.
     */
    public static function toFloat(int|float $value): float
    {
        return is_float($value) ? $value : floatval($value);
    }

    /**
     * Parse the given number to an integer type.
     * You can provide as argument the round type (e.g.: PHP_ROUND_HALF_UP).
     */
    public static function toInteger(int|float $value, int $mode = null): int
    {
        if (is_int($value)) {
            return $value;
        }

        return intval($mode === null ? $value : round($value, mode: $mode));
    }
}
