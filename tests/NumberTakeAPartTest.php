<?php

use Numerable\Number;

it('can get a simple part', function () {
    expect(Number::takeAPart(100, 0.25))
        ->toBeFloat()
        ->toEqual(25);
});

it('can get a simple part using helper', function () {
    expect(num()->takeAPart(100, 0.25))
        ->toBeFloat()
        ->toEqual(25);
});

it('can take 20% from 1000', function () {
    expect(num(1_000)->takeAPart(0.20)->raw())
        ->toBeFloat()
        ->toEqual(200);
});
