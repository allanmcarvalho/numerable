<?php

use Numerable\Number;
use Numerable\Numerable;

it('do a simple diff', function () {
    expect(Number::diff(10, 8))
        ->toBeInt()
        ->toEqual(2);
});

it('do a simple diff using helper', function () {
    expect(num()->diff(15, 5))
        ->toBeInt()
        ->toEqual(10);
});

it('diff a number', function () {
    expect(num(-100)->diff(100)->raw())
        ->toBeInt()
        ->toEqual(200)
    ->and(num(100)->diff(-100)->raw())
        ->toBeInt()
        ->toEqual(200)
        ->and(num(100)->diff(100)->raw())
        ->toBeInt()
        ->toEqual(0)
        ->and(num(100)->diff(98.5)->raw())
        ->toBeFloat()
        ->toEqual(1.5);
});

