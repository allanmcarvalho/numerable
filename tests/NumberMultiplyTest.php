<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple multiplication', function () {
    expect(Number::multiply(1, 4, 6))
        ->toBeInt()
        ->toEqual(24)
        ->and(Number::multiply(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toEqual(43.875);
});

it('can do a simple multiplication using helper', function () {
    expect(num()->multiply(1, 4, 6))
        ->toBeInt()
        ->toEqual(24)
        ->and(num()->multiply(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toEqual(43.875);
});

it('can multiply int values', function () {
    $number = num(new Numerable(10));
    $number2 = $number->multiplyBy(10, 5);

    expect($number)
        ->toEqual(new Numerable(10))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($number2)
        ->toEqual(new Numerable(500))
        ->and($number2->raw())
        ->toBeInt()
        ->toEqual(500);
});

it('can multiply float values', function () {
    $number = num(new Numerable(10.5));
    $number2 = $number->multiplyBy(100, 50);

    expect($number)
        ->toEqual(new Numerable(10.5))
        ->and($number->raw())
        ->toBeFloat()
        ->toEqual(10.5)
        ->and($number2)
        ->toEqual(new Numerable(52500.0))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(52500.0);
});

it('can multiply with mixed args', function () {
    $number = num(new Numerable(5));
    $number2 = $number->multiplyBy(1000, '4', 5.5, new Numerable(2.5));

    expect($number)
        ->toEqual(new Numerable(5))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(5)
        ->and($number2)
        ->toEqual(new Numerable(275_000.0))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(275_000.0);
});
