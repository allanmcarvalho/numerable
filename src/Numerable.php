<?php

namespace Numerable;

class Numerable
{
    public function __construct(
        protected readonly float|int $number
    ) {
        //
    }

    /**
     * Add the given values to the number.
     */
    public function add(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => Number::from($value)->raw(), $values);
        return new static(Number::add($this->number, ...$numbers));
    }

    public function raw(): float|int
    {
        return $this->number;
    }

    /**
     * Subtract the given values to the number.
     */
    public function sub(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => Number::from($value)->raw(), $values);
        return new static(Number::sub($this->number, ...$numbers));
    }
}
