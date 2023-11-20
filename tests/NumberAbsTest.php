<?php

use Numerable\Number;
use Numerable\Numerable;

it('do a simple abs', function () {
    expect(Number::abs(-2))
        ->toBeInt()
        ->toEqual(2);
});

it('do a simple abs using helper', function () {
    expect(num()->abs(-2))
        ->toBeInt()
        ->toEqual(2);
});

it('calculate a variation to', function () {
    expect(num(100)->variationTo(80)->raw())
        ->toBeFloat()
        ->toEqual(0.2)
    ->and(num(80)->variationTo(100)->raw())
        ->toBeFloat()
        ->toEqual(-0.25);
});


//it('calculate a variation from', function () {
//    expect(num(110)->variationFrom(100)->raw())
//        ->toBeFloat()
//        ->toEqual(0.1)
//        ->and(num(100)->variationFrom(110)->raw())
//        ->toBeFloat()
//        ->toEqual(-0.0909090909);
//});
