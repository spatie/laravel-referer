<?php

namespace Spatie\Referer;

use Illuminate\Support\ServiceProvider;

class RefererServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Referer::class);
        $this->app->alias(Referer::class, 'referer');
    }
}
