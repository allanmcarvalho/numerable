<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple format', function () {
    expect(Number::toPercentage(0.3295))
        ->toBeString()
        ->toEqual('32.95%');
});

it('can do a simple format using helper', function () {
    expect(num()->toPercentage(0.3295))
        ->toBeString()
        ->toEqual('32.95%');
});

it('can format with default params', function () {
    $number = num(new Numerable(1));
    $formatted = $number->toPercentage();

    expect($formatted)
        ->toBeString()
        ->toEqual('100.00%');
});


it('can format with source humanized', function () {
    $number = num(new Numerable(100));
    $formatted = $number->toPercentage(sourceHumanized: true);

    expect($formatted)
        ->toBeString()
        ->toEqual('100.00%');
});


it('can format with zero precision', function () {
    $number = num(new Numerable(0.98));
    $formatted = $number->toPercentage(precision: 0);

    expect($formatted)
        ->toBeString()
        ->toEqual('98%');
});

it('can format in other locale', function () {
    $number = num(new Numerable(12.3456));
    $formatted = $number->toPercentage('pt_BR');

    expect($formatted)
        ->toBeString()
        ->toEqual("1.234,56%");
});
