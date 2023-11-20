<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple format', function () {
    expect(Number::toFormat(22.32))
        ->toBeString()
        ->toEqual('22.32');
});

it('can do a simple format using helper', function () {
    expect(num()->toFormat(22.32))
        ->toBeString()
        ->toEqual('22.32');
});

it('can format with default params', function () {
    $number = num(new Numerable(12.59));
    $formatted = $number->toFormat();

    expect($formatted)
        ->toBeString()
        ->toEqual('12.59');
});

it('can format with a fixed places', function () {
    $number = num(new Numerable(231.322));
    $formatted = $number->toFormat(places: 4);

    expect($formatted)
        ->toBeString()
        ->toEqual('231.3220');
});

it('can format with a fixed places and a higher precision', function () {
    $number = num(new Numerable(100.123));
    $formatted = $number->toFormat(places: 2, precision: 3);

    expect($formatted)
        ->toBeString()
        ->toEqual('100.123');
});

it('can format in other locale', function () {
    $number = num(new Numerable(1_234.42));
    $formatted = $number->toFormat('pt_BR');

    expect($formatted)
        ->toBeString()
        ->toEqual("1.234,42");
});

it('can format with prefix', function () {
    $number = num(new Numerable(34.21));
    $formatted = $number->toFormat(prefix: 'fooBar');

    expect($formatted)
        ->toBeString()
        ->toEqual("fooBar34.21");
});

it('can format with suffix', function () {
    $number = num(new Numerable(4));
    $formatted = $number->toFormat(suffix: ' oranges');

    expect($formatted)
        ->toBeString()
        ->toEqual("4 oranges");
});

it('can format with pattern', function () {
    $number = num(new Numerable(12.43));
    $formatted = $number->toFormat(pattern: '000.000');

    expect($formatted)
        ->toBeString()
        ->toEqual("012.430");
});

it('can format with delta', function () {
    expect(num(43.21)->toFormat(delta: true))
        ->toBeString()
        ->toEqual("+43.21")
        ->and(num(-43.21)->toFormat(delta: true))
        ->toBeString()
        ->toEqual("-43.21")
        ->and(num(43.21)->toFormat(prefix: 'foobar ', delta: true))
        ->toBeString()
        ->toEqual("foobar +43.21");
});
