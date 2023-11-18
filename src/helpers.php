<?php

use Numerable\Number;
use Numerable\Numerable;

if (! function_exists('num')) {
    /**
     * Get a new numerable object from the given number.
     */
    function num(Numerable|int|float|string $number = null): ?Numerable
    {
        return Number::from($number);
    }
}
