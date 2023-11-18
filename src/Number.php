<?php

namespace Numerable;

use NumberFormatter;

class Number
{
    public static function from(Numerable|int|float|string|null $number): ?Numerable
    {
        if ($number instanceof Numerable) {
            return new Numerable($number->raw());
        }
        if (is_numeric($number)) {
            return new Numerable($number);
        }

        return null;
    }

    public static function parse(string $number, string $locale = null): ?Numerable
    {
        $formatter = new NumberFormatter($locale ?? config('app.locale', 'en'), NumberFormatter::DECIMAL);
        $newNumber = preg_replace('/[^0-9,.]+/', '', $number);
        $multiplier = in_array(ord(mb_substr($number, 0, 1)), [226, 45]) ? -1 : 1;

        return $newNumber === '' ? null : new Numerable($formatter->parse($newNumber) * $multiplier);
    }
}
