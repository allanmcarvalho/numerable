<?php

namespace Numerable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Numerable\Numerable
 */
class Numerable extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Numerable\Numerable::class;
    }
}
