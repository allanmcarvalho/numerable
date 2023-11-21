<?php

it('can convert to human', function () {
    expect(num(1)->asHumanPercentage()->raw())
        ->toBeFloat()
        ->toEqual(100)
        ->and(num(0.5)->asHumanPercentage()->raw())
        ->toBeFloat()
        ->toEqual(50.0)
        ->and(num(0.776)->asHumanPercentage()->raw())
        ->toBeFloat()
        ->toEqual(77.6);
});

it('can convert to fraction', function () {
    expect(num(100)->asFractionPercentage()->raw())
        ->toBeFloat()
        ->toEqual(1)
        ->and(num(50)->asFractionPercentage()->raw())
        ->toBeFloat()
        ->toEqual(0.5)
        ->and(num(77.6)->asFractionPercentage()->raw())
        ->toBeFloat()
        ->toEqual(0.776);
});
