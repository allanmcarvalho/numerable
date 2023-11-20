<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple format', function () {
    expect(Number::toOrdinal(1))
        ->toBeString()
        ->toEqual('1st');
});

it('can do a simple format using helper', function () {
    expect(num()->toOrdinal(2))
        ->toBeString()
        ->toEqual('2nd');
});

it('can format with default params', function () {
    $number = num(new Numerable(100));
    $formatted = $number->toOrdinal();

    expect($formatted)
        ->toBeString()
        ->toEqual('100th');
});

it('can format in other locale', function () {
    $number = num(new Numerable(1));
    $formatted = $number->toOrdinal('pt_BR');

    expect($formatted)
        ->toBeString()
        ->toEqual('1º');
});
