<?php

namespace Numerable;

class Numerable
{
    public function __construct(
        protected readonly float|int $number
    ) {

    }

    public function raw(): float|int
    {
        return $this->number;
    }

    /**
     * Add the given values to the number.
     */
    public function add(Numerable|int|float|string ...$values): static
    {
        $numbers = array_map(fn ($value) => (new static($value))->raw(), $values);
        return new static(Number::sum($this->number, ...$numbers));
    }
}
