<?php

namespace Spatie\Referer\Facades;

use Illuminate\Support\Facades\Facade;

class Referer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'referer';
    }
}
