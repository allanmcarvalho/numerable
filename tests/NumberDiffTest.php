<?php

use Numerable\Number;

it('do a simple diff', function () {
    expect(Number::diff(10, 8))
        ->toBeFloat()
        ->toEqual(2.0);
});

it('do a simple diff using helper', function () {
    expect(num()->diff(15, 5))
        ->toBeFloat()
        ->toEqual(10.0);
});

it('diff a number', function () {
    expect(num(-100)->diff(100)->raw())
        ->toBeFloat()
        ->toEqual(200.0)
        ->and(num(100)->diff(-100)->raw())
        ->toBeFloat()
        ->toEqual(200.0)
        ->and(num(100)->diff(100)->raw())
        ->toBeFloat()
        ->toEqual(0.0)
        ->and(num(100)->diff(98.5)->raw())
        ->toBeFloat()
        ->toEqual(1.5);
});
