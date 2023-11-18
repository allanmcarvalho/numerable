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
}
