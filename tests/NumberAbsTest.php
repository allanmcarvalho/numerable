<?php

use Numerable\Number;
use Numerable\Numerable;

it('do a simple abs', function () {
    expect(Number::abs(-2))
        ->toBeInt()
        ->toEqual(2);
});

it('do a simple abs using helper', function () {
    expect(num()->abs(-2))
        ->toBeInt()
        ->toEqual(2);
});

it('abs a number', function () {
    expect(num(-100)->abs()->raw())
        ->toBeInt()
        ->toEqual(100)
    ->and(num(-85.32)->abs()->raw())
        ->toBeFloat()
        ->toEqual(85.32);
});

