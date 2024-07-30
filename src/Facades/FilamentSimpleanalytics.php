<?php

namespace Oosterhoff\FilamentSimpleanalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oosterhoff\FilamentSimpleanalytics\FilamentSimpleanalytics
 */
class FilamentSimpleanalytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Oosterhoff\FilamentSimpleanalytics\FilamentSimpleanalytics::class;
    }
}
