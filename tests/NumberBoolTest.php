<?php

use Numerable\Number;

it('can do a equal check', function () {
    expect(Number::equal(1, 1))
        ->toBeTrue();
});

it('can do a equal check using helper', function () {
    expect(num()->equal(1.0, 1, true))
        ->toBeFalse();
});

it('can do a equal check with instance', function () {
    expect(num(1.0)->equal(1))
        ->toBeTrue()
        ->and(num(1.0)->equal(1, strict: true))
        ->toBeFalse();
});

it('can do a lt check with instance', function () {
    expect(num(10)->lt(9.0))
        ->toBeFalse()
        ->and(num(10)->lt(10))
        ->toBeFalse()
        ->and(num(10)->lt(11))
        ->toBeTrue();
});

it('can do a lte check with instance', function () {
    expect(num(10)->lte(9))
        ->toBeFalse()
        ->and(num(10)->lte(10.0))
        ->toBeTrue()
        ->and(num(10)->lte(11))
        ->toBeTrue();
});

it('can do a gt check with instance', function () {
    expect(num(9)->gt(10))
        ->toBeFalse()
        ->and(num(10)->gt(10.0))
        ->toBeFalse()
        ->and(num(10)->gt(9))
        ->toBeTrue();
});

it('can do a gte check with instance', function () {
    expect(num(9)->gte(10))
        ->toBeFalse()
        ->and(num(10)->gte(10.0))
        ->toBeTrue()
        ->and(num(10)->gte(9))
        ->toBeTrue();
});

it('is a negative number', function () {
    expect(num(15)->isNegative())
        ->toBeFalse()
        ->and(num(-15)->isNegative())
        ->toBeTrue();
});

it('is a positive number', function () {
    expect(num(15)->isPositive())
        ->toBeTrue()
        ->and(num(-15)->isPositive())
        ->toBeFalse();
});

it('is an even number', function () {
    expect(num(2)->isEven())
        ->toBeTrue()
        ->and(num(1)->isEven())
        ->toBeFalse()
        ->and(num(2.5)->isEven())
        ->toBeTrue();
});

it('is an odd number', function () {
    expect(num(2)->isOdd())
        ->toBeFalse()
        ->and(num(1)->isOdd())
        ->toBeTrue()
        ->and(num(2.5)->isOdd())
        ->toBeFalse();
});

it('is a float number', function () {
    expect(num(2)->isFloat())
        ->toBeFalse()
        ->and(num(1.4)->isFloat())
        ->toBeTrue();
});

it('is a integer number', function () {
    expect(num(2.2)->isInteger())
        ->toBeFalse()
        ->and(num(5)->isInteger())
        ->toBeTrue();
});

it('is a multiple of', function () {
    expect(num(15)->isMultipleOf(5))
        ->toBeTrue()
        ->and(num(15)->isMultipleOf(10))
        ->toBeFalse();
});
