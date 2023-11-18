<?php

use Numerable\Number;
use Numerable\Numerable;

it('return numerable from numerable instance', function () {
    $numerable = Number::from(10);
    $numerable2 = Number::from($numerable);

    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($numerable2)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable2->raw())
        ->toBeInt()
        ->toEqual(10)
        ->and($numerable === $numerable2)
        ->toBeFalse();
});

it('return numerable from int numeric string', function () {
    $numerable = Number::from('21');
    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeInt()
        ->toEqual(21);
});

it('return numerable from float numeric string', function () {
    $numerable = Number::from('63.24');
    expect($numerable)
        ->toBeInstanceOf(Numerable::class)
        ->and($numerable->raw())
        ->toBeFloat()
        ->toEqual(63.24);
});

it('return null on non numeric string', function () {
    $numerable = Number::from('aaa');
    expect($numerable)
        ->toBeNull();
    $numerable = Number::from('');
    expect($numerable)
        ->toBeNull();
});
