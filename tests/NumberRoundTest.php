<?php

use Numerable\Enums\RoundMode;
use Numerable\Number;

it('can do a simple round', function () {
    expect(Number::round(22.32))
        ->toBeFloat()
        ->toEqual(22.0);
});

it('can do a simple round using helper', function () {
    expect(num()->round(22.32))
        ->toBeFloat()
        ->toEqual(22.0);
});

it('can round ralf down', function () {
    expect(num(1.23)->round()->raw())
        ->toBeFloat()
        ->toEqual(1.0)
        ->and(num(1.23)->round(1, RoundMode::HALF_DOWN)->raw())
        ->toBeFloat()
        ->toEqual(1.2)
        ->and(num(1.25)->round(1, RoundMode::HALF_DOWN)->raw())
        ->toBeFloat()
        ->toEqual(1.2)
        ->and(num(1.251)->round(1, RoundMode::HALF_DOWN)->raw())
        ->toBeFloat()
        ->toEqual(1.3);
});

it('can round ralf up', function () {
    expect(num(1.23)->round()->raw())
        ->toBeFloat()
        ->toEqual(1.0)
        ->and(num(1.23)->round(1)->raw())
        ->toBeFloat()
        ->toEqual(1.2)
        ->and(num(1.25)->round(1)->raw())
        ->toBeFloat()
        ->toEqual(1.3)
        ->and(num(1.251)->round(1)->raw())
        ->toBeFloat()
        ->toEqual(1.3);
});

it('can round floor', function () {
    expect(num(1.23)->round(0, RoundMode::FLOOR)->raw())
        ->toBeFloat()
        ->toEqual(1.0)
        ->and(num(1.2)->round(1, RoundMode::FLOOR)->raw())
        ->toBeFloat()
        ->toEqual(1.2)
        ->and(num(1.255)->round(2, RoundMode::FLOOR)->raw())
        ->toBeFloat()
        ->toEqual(1.25)
        ->and(num(1.2512)->round(3, RoundMode::FLOOR)->raw())
        ->toBeFloat()
        ->toEqual(1.251);
});

it('can round ceil', function () {
    expect(num(1.23)->round(0, RoundMode::CEIL)->raw())
        ->toBeFloat()
        ->toEqual(2.0)
        ->and(num(1.2)->round(1, RoundMode::CEIL)->raw())
        ->toBeFloat()
        ->toEqual(1.2)
        ->and(num(1.21)->round(1, RoundMode::CEIL)->raw())
        ->toBeFloat()
        ->toEqual(1.3)
        ->and(num(1.254)->round(2, RoundMode::CEIL)->raw())
        ->toBeFloat()
        ->toEqual(1.26);
});

it('return string on round mode label', function () {
    expect(RoundMode::HALF_DOWN->getLabel())
        ->toBeString();
});
