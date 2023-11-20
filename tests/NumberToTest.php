<?php

use Numerable\Number;

it('can do a simple cast', function () {
    expect(Number::toInteger(2.5))
        ->toBeInt()
        ->toEqual(2)
        ->and(Number::toFloat(2))
        ->toBeFloat()
        ->toEqual(2.0);
});

it('can do a simple sub using helper', function () {
    expect(num()->toInteger(2.5))
        ->toBeInt()
        ->toEqual(2)
        ->and(num()->toFloat(2))
        ->toBeFloat()
        ->toEqual(2.0);
});

it('can cast int to float and float to int', function () {
    expect(Number::from(10)->toFloat())
        ->toBeFloat()
        ->toEqual(10.0)
        ->and(Number::from(10.5)->toInteger())
        ->toBeInt()
        ->toEqual(10);
});

it('can cast int to int', function () {
    expect(Number::from(10)->toInteger())
        ->toBeInt()
        ->toEqual(10);
});

it('can round in many ways', function () {
    $number1 = Number::from(2.5);
    $number2 = Number::from(2.4);
    $number3 = Number::from(2.6);

    expect($number1->toInteger())
        ->toBeInt()
        ->toEqual(2)
        ->and($number1->toInteger(PHP_ROUND_HALF_UP))
        ->toBeInt()
        ->toEqual(3)
        ->and($number2->toInteger(PHP_ROUND_HALF_UP))
        ->toBeInt()
        ->toEqual(2)
        ->and($number3->toInteger(PHP_ROUND_HALF_UP))
        ->toBeInt()
        ->toEqual(3)
        ->and($number1->toInteger(PHP_ROUND_HALF_DOWN))
        ->toBeInt()
        ->toEqual(2)
        ->and($number2->toInteger(PHP_ROUND_HALF_DOWN))
        ->toBeInt()
        ->toEqual(2)
        ->and($number3->toInteger(PHP_ROUND_HALF_DOWN))
        ->toBeInt()
        ->toEqual(3);
});
