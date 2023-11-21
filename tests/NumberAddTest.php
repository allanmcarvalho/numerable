<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple sum', function () {
    expect(Number::add(1, 4, 6))
        ->toBeFloat()
        ->toEqual(11.0)
        ->and(Number::add(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toEqual(12.5);
});

it('can do a simple sum using helper', function () {
    expect(num()->add(1, 4, 6))
        ->toBeFloat()
        ->toEqual(11.0)
        ->and(num()->add(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toEqual(12.5);
});

it('can sum int values', function () {
    $number = num(new Numerable(1));
    $number2 = $number->add(5, 10);

    expect($number)
        ->toEqual(new Numerable(1))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(1)
        ->and($number2)
        ->toEqual(new Numerable(16))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(16.0);
});

it('can sum float values', function () {
    $number = num(new Numerable(1.5));
    $number2 = $number->add(2.62, 3.943);

    expect($number)
        ->toEqual(new Numerable(1.5))
        ->and($number->raw())
        ->toBeFloat()
        ->toEqual(1.5)
        ->and($number2)
        ->toEqual(new Numerable(8.063))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(8.063);
});

it('can sum with mixed args', function () {
    $number = num(new Numerable(10));
    $number2 = $number->add(1, '3', 5.5, new Numerable(2.5));

    expect($number)
        ->toEqual(new Numerable(10))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($number2)
        ->toEqual(new Numerable(22))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(22);
});
