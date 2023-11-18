<?php

namespace Numerable;

use NumberFormatter;

class Number
{
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
     * Sum the given values.
     */
    public static function sum(int|float ...$values): float|int
    {
        return array_sum($values);
    }
}
