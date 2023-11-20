<?php

use Numerable\Number;
use Numerable\Numerable;

it('can do a simple format', function () {
    expect(Number::toCurrency(22.32))
        ->toBeString()
        ->toEqual('$22.32');
});

it('can do a simple format using helper', function () {
    expect(num()->toCurrency(22.32))
        ->toBeString()
        ->toEqual('$22.32');
});

it('can format with default params', function () {
    $number = num(new Numerable(12.59));
    $formatted = $number->toCurrency();

    expect($formatted)
        ->toBeString()
        ->toEqual('$12.59');
});

it('can format in other currency', function () {
    $number = num(new Numerable(21.21));
    $formatted = $number->toCurrency('BRL');

    expect($formatted)
        ->toBeString()
        ->toEqual('R$21.21');
});

it('can format in other currency in other locale', function () {
    $number = num(new Numerable(1_234.42));
    $formatted = $number->toCurrency('BRL', 'pt_BR');

    expect($formatted)
        ->toBeString()
        ->toEqual("R$\u{A0}1.234,42");
});

it('can format using intl code', function () {
    $number = num(new Numerable(34.21));
    $formatted = $number->toCurrency(useIntlCode: true);

    expect($formatted)
        ->toBeString()
        ->toEqual("USD\u{A0}34.21");
});

it('can format without account', function () {
    $number = num(new Numerable(-15.15));
    $formatted = $number->toCurrency();

    expect($formatted)
        ->toBeString()
        ->toEqual("-$15.15");
});

it('can format with account', function () {
    $number = num(new Numerable(-15.15));
    $formatted = $number->toCurrency(accounting: true);

    expect($formatted)
        ->toBeString()
        ->toEqual("($15.15)");
});

it('can format with 4 places', function () {
    $number = num(new Numerable(10.2222));
    $formatted = $number->toCurrency(places: 4);

    expect($formatted)
        ->toBeString()
        ->toEqual("$10.2222");
});

it('can format with 4 precision', function () {
    $number = num(new Numerable(10.2222));
    $formatted = $number->toCurrency(places: 2, precision: 3);

    expect($formatted)
        ->toBeString()
        ->toEqual("$10.222");
});
