<?php

use Numerable\Number;
use Numerable\Numerable;

it('parse percentagem in en locale', function () {
    $numerable = Number::parse('21,321.43%', 'en');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toEqual(21_321.43);
});

it('parse currency in pt-BR locale', function () {
    $numerable = Number::parse('R$10.321,32', 'pt_BR');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toEqual(10_321.32);
});

it('parse number in fr locale', function () {
    $numerable = Number::parse('105 212 231,32', 'fr');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toEqual(105_212_231.32);
});

it('is negative', function () {
    $numerable = Number::parse('-12.43', 'en');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toBeLessThan(0)
        ->toEqual(-12.43);
});

it('is negative with other negative char', function () {
    $numerable = Number::parse("\xE212.43", 'en');
    $numerable2 = Number::parse('−10.55', 'en');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toBeLessThan(0)
        ->toEqual(-12.43)
        ->and($numerable2)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable2->raw())
        ->toBeFloat()
        ->toBeLessThan(0)
        ->toEqual(-10.55);
});

it('is positive', function () {
    $numerable = Number::parse('12.43', 'en');

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toBeGreaterThan(0)
        ->toEqual(12.43);
});
