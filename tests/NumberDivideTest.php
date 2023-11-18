<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple division', function () {
    expect(Number::divide(4, 4))
        ->toBeInt()
        ->toEqual(1)
        ->and(Number::divide(4.5, 3))
        ->toBeFloat()
        ->toEqual(1.5)
        ->and(Number::divide(4, 0))
        ->toThrow(InvalidArgumentException::class)
        ->and(Number::divide(4, 0, fn () => 5))
        ->toEqual(5);
})->throws(InvalidArgumentException::class);

it('can do a simple division using helper', function () {
    expect(num()->divide(4, 4))
        ->toBeInt()
        ->toEqual(1)
        ->and(num()->divide(4.5, 3))
        ->toBeFloat()
        ->toEqual(1.5)
        ->and(num()->divide(4, 0))
        ->toThrow(InvalidArgumentException::class)
        ->and(num()->divide(4, 0, fn () => 5))
        ->toEqual(5);
})->throws(InvalidArgumentException::class);

it('can be divided by int values', function () {
    $number = num(new Numerable(10));
    $number2 = $number->dividedBy(2);

    expect($number)
        ->toEqual(new Numerable(10))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($number2)
        ->toEqual(new Numerable(5))
        ->and($number2->raw())
        ->toBeInt()
        ->toEqual(5);
});

it('can be divided by float values even if zero', function () {
    $number = num(new Numerable(10));
    $number2 = $number->dividedBy(0, fn () => 300);

    expect($number)
        ->toEqual(new Numerable(10))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($number2)
        ->toEqual(new Numerable(300))
        ->and($number2->raw())
        ->toBeInt()
        ->toEqual(300);
});

it('can be divided by float values', function () {
    $number = num(new Numerable(10));
    $number2 = $number->dividedBy(2.5);

    expect($number)
        ->toEqual(new Numerable(10))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($number2)
        ->toEqual(new Numerable(4))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(4.0);
});

it('can divide int values', function () {
    $number = num(new Numerable(2));
    $number2 = $number->divide(10);

    expect($number)
        ->toEqual(new Numerable(2))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(2)
        ->and($number2)
        ->toEqual(new Numerable(5))
        ->and($number2->raw())
        ->toBeInt()
        ->toEqual(5);
});

it('can divide float values', function () {
    $number = num(new Numerable(2.5));
    $number2 = $number->divide(10);

    expect($number)
        ->toEqual(new Numerable(2.5))
        ->and($number->raw())
        ->toBeFloat()
        ->toEqual(2.5)
        ->and($number2)
        ->toEqual(new Numerable(4))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(4.0);
});

it('can divide float values even divisor is 0', function () {
    $number = num(new Numerable(0));
    $number2 = $number->divide(10, fn () => 432.2);

    expect($number)
        ->toEqual(new Numerable(0))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(0)
        ->and($number2)
        ->toEqual(new Numerable(432.2))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(432.2);
});
