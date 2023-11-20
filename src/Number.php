<?php

namespace Numerable;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;
use NumberFormatter;
use function Laravel\Prompts\select;

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
     * Compare two numbers.
     */
    public static function equal(int|float $value1, int|float $value2, bool $strict = false): bool
    {
        return $strict ?
            $value1 === $value2 :
            $value1 == $value2;
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
            }
            if ($precision !== null) {
                $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $precision);
            }
            if ($pattern !== null) {
                $formatter->setPattern($pattern);
            }

            return $formatter;
        });
    }

    /**
     * Check if the value 1 is greater than the value 2.
     */
    public static function gt(int|float $value1, int|float $value2): bool
    {
        return $value1 > $value2;
    }

    /**
     * Check if the value 1 is greater than or equal to the value 2.
     */
    public static function gte(int|float $value1, int|float $value2): bool
    {
        return $value1 >= $value2;
    }

    /**
     * Check if the given value is an even number.
     */
    public static function isEven(int|float $value): bool
    {
        return floor($value) % 2 === 0;
    }

    /**
     * Check if the given value is a float.
     */
    public static function isFloat(int|float $value): bool
    {
        return is_float($value);
    }

    /**
     * Check if the given value is an integer.
     */
    public static function isInteger(int|float $value): bool
    {
        return is_int($value);
    }

    /**
     * Check if the given value is a multiple of the given multiple.
     */
    public static function isMultipleOf(int|float $value, int|float $multiple): bool
    {
        return $value % $multiple === 0;
    }

    /**
     * Check if the given value is a negative number.
     */
    public static function isNegative(int|float $value): bool
    {
        return $value < 0;
    }

    /**
     * Check if the given value is an odd number.
     */
    public static function isOdd(int|float $value): bool
    {
        return floor($value) % 2 !== 0;
    }

    /**
     * Check if the given value is a positive number.
     */
    public static function isPositive(int|float $value): bool
    {
        return $value >= 0;
    }

    /**
     * Check if the value 1 is less than the value 2.
     */
    public static function lt(int|float $value1, int|float $value2): bool
    {
        return $value1 < $value2;
    }

    /**
     * Check if the value 1 is less than or equal to the value 2.
     */
    public static function lte(int|float $value1, int|float $value2): bool
    {
        return $value1 <= $value2;
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
     * Format the given number to a currency.
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
     * Format the given number type to a formatted number.
     */
    public static function toFormat(
        int|float $value,
        string $locale = null,
        int $places = null,
        int $precision = null,
        string $prefix = '',
        string $suffix = '',
        string $pattern = null,
        bool $delta = false,
    ): string {
        $formatter = self::getIntlFormatter($locale, NumberFormatter::DECIMAL, $places, $precision, $pattern);
        if ($delta) {
            $prefix = $value > 0 ? $prefix.'+' : $prefix;
        }

        return $prefix . $formatter->format($value) . $suffix;
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

    /**
     * Format the given number to an ordinal.
     */
    public static function toOrdinal(
        int $value,
        string $locale = null,
    ): string {
        return self::getIntlFormatter($locale, NumberFormatter::ORDINAL)->format($value);
    }

    /**
     * Format the given number to a percentage.
     */
    public static function toPercentage(
        int|float $value,
        string $locale = null,
        int $precision = 2,
        bool $sourceHumanized = false,
    ): string {
        return self::getIntlFormatter($locale, NumberFormatter::PERCENT, $precision, $precision)
            ->format($sourceHumanized ? $value / 100 : $value);
    }

    /**
     * Format the given number to a readable size.
     */
    public static function toReadableSize(
        int|float $size,
        string $locale = null,
        bool $short = true,
        int $places = 0,
        int $precision = 2
    ): string {
        $params = match (true) {
            $size < pow(1024, 1) => [$size, 'byte', 'B'],
            $size < pow(1024, 2) => [$size / pow(1024, 1), 'kilobyte', 'KB'],
            $size < pow(1024, 3) => [$size / pow(1024, 2), 'megabyte', 'MB'],
            $size < pow(1024, 4) => [$size / pow(1024, 3), 'gigabyte', 'GB'],
            $size < pow(1024, 5) => [$size / pow(1024, 4), 'terabyte', 'TB'],
            $size < pow(1024, 6) => [$size / pow(1024, 5), 'petabyte', 'PB'],
            default => [$size / pow(1024, 6), 'exabyte', 'EB'],
        };

        return self::toFormat(
            $params[0],
            $locale,
            $places,
            $precision,
            suffix: $short ? $params[2] : ' '.Str::plural($params[1], $params[0]),
        );
    }
}
