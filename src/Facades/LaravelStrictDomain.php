<?php

namespace ByteFlick\LaravelStrictDomain\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ByteFlick\LaravelStrictDomain\LaravelStrictDomain
 */
class LaravelStrictDomain extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ByteFlick\LaravelStrictDomain\LaravelStrictDomain::class;
    }
}
