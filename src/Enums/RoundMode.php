<?php

namespace Numerable\Enums;

enum RoundMode: int
{
    case HALF_UP = 1;
    case HALF_DOWN = 2;
    case HALF_EVEN = 3;
    case HALF_ODD = 4;
    case FLOOR = 5;
    case CEIL = 6;

    public function getLabel(): string
    {
        return match($this) {
            self::HALF_UP => 'Half Up',
            self::HALF_DOWN => 'Half Down',
            self::HALF_EVEN => 'Half Even',
            self::HALF_ODD => 'Half Odd',
            self::FLOOR => 'Up',
            self::CEIL => 'Down',
        };
    }
}
