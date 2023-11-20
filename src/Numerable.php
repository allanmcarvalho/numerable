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
    public function dividedBy(Numerable|int|float|string $divisor, callable $zeroSafeCallback = null): static
    {
        return new static(Number::divide($this->number, Number::from($divisor)->raw(), $zeroSafeCallback));
    }

    /**
     * Multiply the given values to the number.
     */
    public function multiply(Numerable|int|float|string ...$values): static
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
    ): string {
        return Number::toFormat($this->number, $locale, $places, $precision, $prefix, $suffix, $pattern);
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
}
