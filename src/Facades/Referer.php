<?php

namespace Spatie\Referer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string get()
 * @method static void forget()
 * @method static void put(string $referer)
 * @method static void putFromRequest(\Illuminate\Http\Request $request)
 */
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
