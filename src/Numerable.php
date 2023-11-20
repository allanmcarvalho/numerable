<?php

namespace Numerable;

class Numerable
{
    public function __construct(
        protected readonly float|int $number
    ) {
        //
    }

    /**
     * Add the given values to the number.
     */
    public function add(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => Number::from($value)->raw(), $values);

        return new static(Number::add($this->number, ...$numbers));
    }

    public function equal(Numerable|int|float|string $value, bool $strict = false): bool
    {
        return Number::equal($this->number, Number::from($value)->raw(), $strict);
    }

    /**
     * Divide a given dividend by the number.
     */
    public function divide(Numerable|int|float|string $dividend, callable $zeroSafeCallback = null): static
    {
        return new static(Number::divide(Number::from($dividend)->raw(), $this->number, $zeroSafeCallback));
    }

    /**
     * Divide the number by the given divisor.
     */
    public function divideBy(Numerable|int|float|string $divisor, callable $zeroSafeCallback = null): static
    {
        return new static(Number::divide($this->number, Number::from($divisor)->raw(), $zeroSafeCallback));
    }

    /**
     * Check if the instance is equal to the given value.
     */
    public function gt(Numerable|int|float|string $value): bool
    {
        return Number::gt($this->number, Number::from($value)->raw());
    }

    /**
     * Check if the instance is greater than or equal to the given value.
     */
    public function gte(Numerable|int|float|string $value): bool
    {
        return Number::gte($this->number, Number::from($value)->raw());
    }

    /**
     * Check if the instance is an even number.
     */
    public function isEven(): bool
    {
        return Number::isEven($this->number);
    }

    /**
     * Check if the instance is a float number.
     */
    public function isFloat(): bool
    {
        return Number::isFloat($this->number);
    }

    /**
     * Check if the instance is an integer number.
     */
    public function isInteger(): bool
    {
        return Number::isInteger($this->number);
    }

    public function isMultipleOf(Numerable|int|float|string $multiple): bool
    {
        return Number::isMultipleOf($this->number, Number::from($multiple)->raw());
    }

    /**
     * Check if the instance is a negative number.
     */
    public function isNegative(): bool
    {
        return Number::isNegative($this->number);
    }

    /**
     * Check if the instance is an odd number.
     */
    public function isOdd(): bool
    {
        return Number::isOdd($this->number);
    }

    /**
     * Check if the instance is a positive number.
     */
    public function isPositive(): bool
    {
        return Number::isPositive($this->number);
    }

    /**
     * Check if the instance is less than the given value.
     */
    public function lt(Numerable|int|float|string $value): bool
    {
        return Number::lt($this->number, Number::from($value)->raw());
    }

    /**
     * Check if the instance is less than or equal to the given value.
     */
    public function lte(Numerable|int|float|string $value): bool
    {
        return Number::lte($this->number, Number::from($value)->raw());
    }

    /**
     * Multiply the given values to the number.
     */
    public function multiplyBy(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => Number::from($value)->raw(), $values);

        return new static(Number::multiply($this->number, ...$numbers));
    }

    public function raw(): float|int
    {
        return $this->number;
    }

    /**
     * Subtract the given values to the number.
     */
    public function sub(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => Number::from($value)->raw(), $values);

        return new static(Number::sub($this->number, ...$numbers));
    }

    /**
     * Format the instance to a currency.
     */
    public function toCurrency(
        string $currency = null,
        string $locale = null,
        bool $accounting = false,
        bool $useIntlCode = false,
        int $places = null,
        int $precision = null,
    ): string {
        return Number::toCurrency($this->number, $currency, $locale, $accounting, $useIntlCode, $places, $precision);
    }

    /**
     * Parse to a float instance.
     */
    public function toFloat(): float
    {
        return Number::toFloat($this->number);
    }

    /**
     * Format the instance to a formatted number.
     */
    public function toFormat(
        string $locale = null,
        int $places = null,
        int $precision = null,
        string $prefix = '',
        string $suffix = '',
        string $pattern = null,
        bool $delta = false,
    ): string {
        return Number::toFormat($this->number, $locale, $places, $precision, $prefix, $suffix, $pattern, $delta);
    }

    /**
     * Parse to an integer instance.
     * You can provide as argument the round type (e.g.: PHP_ROUND_HALF_UP).
     */
    public function toInteger(int $mode = null): int
    {
        return Number::toInteger($this->number, $mode);
    }

    /**
     * Format the instance to an ordinal.
     */
    public function toOrdinal(string $locale = null): string
    {
        return Number::toOrdinal($this->toInteger(), $locale);
    }

    /**
     * Format the instance to a percentage.
     */
    public function toPercentage(
        string $locale = null,
        int $precision = 2,
        bool $sourceHumanized = false,
    ): string {
        return Number::toPercentage($this->number, $locale, $precision, $sourceHumanized);
    }

    /**
     * Format the instance to a readable size.
     */
    public function toReadableSize(
        string $locale = null,
        bool $short = true,
        int $places = 0,
        int $precision = 2
    ): string {
        return Number::toReadableSize($this->number, $locale, $short, $places, $precision);
    }
}
