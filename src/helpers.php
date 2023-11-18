<?php

use Numerable\Number;
use Numerable\Numerable;

if (! function_exists('num')) {
    /**
     * Get a new numerable object from the given number.
     * @param  \Numerable\Numerable|int|float|string|null  $number
     * @return \Numerable\Numerable|mixed
     */
    function num(Numerable|int|float|string|null $number = null)
    {
        if (func_num_args() === 0) {
            return new class
            {
                public function __call($method, $parameters)
                {
                    return Number::$method(...$parameters);
                }

                public function __toString()
                {
                    return '';
                }
            };
        }
        return Number::from($number);
    }
}
