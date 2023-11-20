<?php

// config for Numerable
return [

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | This will be the default currency used when formatting a number to a
    | currency. You can change this value to any currency code supported by the
    | NumberFormatter class. Alternatively, you can set the currency when
    | formatting a number by using the toCurrency() method.
    */
    'default_currency' => env('NUMERABLE_DEFAULT_CURRENCY', 'USD'),
];
