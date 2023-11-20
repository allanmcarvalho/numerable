<?php

use Numerable\Enums\RoundMode;
use Numerable\Number;
use Numerable\Numerable;

it('can do a simple format', function () {
    expect(Number::roundAsMultipleOf(22.32, 0.1))
        ->toBeFloat()
        ->toEqual(22.3);
});

it('can do a simple format using helper', function () {
    expect(Number::roundAsMultipleOf(22.36, 0.1))
        ->toBeFloat()
        ->toEqual(22.4);
});

it('can round 0.5 multiple', function () {
    expect(num(29_431.432)->roundAsMultipleOf(0.5)->raw())
        ->toBeFloat()
        ->toEqual(29_431.5);
});

it('can round 0.1 multiple', function () {
    expect(num(29_431.46)->roundAsMultipleOf(0.1)->raw())
        ->toBeFloat()
        ->toEqual(29_431.5)
        ->and(num(29_431.43)->roundAsMultipleOf(0.1)->raw())
        ->toBeFloat()
        ->toEqual(29_431.4);
});
