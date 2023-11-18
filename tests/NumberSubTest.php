<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple sub', function () {
    expect(Number::sub(1, 4, 6))
        ->toBeInt()
        ->toEqual(-9)
        ->toBeLessThan(0)
        ->and(Number::sub(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toBeLessThan(0)
        ->toEqual(-9.5);
});

it('can do a simple sub using helper', function () {
    expect(num()->sub(1, 4, 6))
        ->toBeInt()
        ->toEqual(-9)
        ->toBeLessThan(0)
        ->and(num()->sub(1.5, 4.5, 6.5))
        ->toBeFloat()
        ->toBeLessThan(0)
        ->toEqual(-9.5);
});

it('can sub int values', function () {
    $number = num(new Numerable(115));
    $number2 = $number->sub(5, 10);

    expect($number)
        ->toEqual(new Numerable(115))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(115)
        ->and($number2)
        ->toEqual(new Numerable(100))
        ->and($number2->raw())
        ->toBeInt()
        ->toEqual(100);
});

it('can sub float values', function () {
    $number = num(new Numerable(255.3));
    $number2 = $number->sub(55.4, 49.9);

    expect($number)
        ->toEqual(new Numerable(255.3))
        ->and($number->raw())
        ->toBeFloat()
        ->toEqual(255.3)
        ->and($number2)
        ->toEqual(new Numerable(150))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(150);
});

it('can sub with mixed args', function () {
    $number = num(new Numerable(50));
    $number2 = $number->sub(1, '3', 5.5, new Numerable(2.5));

    expect($number)
        ->toEqual(new Numerable(50))
        ->and($number->raw())
        ->toBeInt()
        ->toEqual(50)
        ->and($number2)
        ->toEqual(new Numerable(38))
        ->and($number2->raw())
        ->toBeFloat()
        ->toEqual(38);
});
