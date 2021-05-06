<?php

namespace Spatie\Referer;

use Illuminate\Support\ServiceProvider;

class RefererServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/referer.php' => config_path('referer.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/referer.php', 'referer');

        $this->app->when(Referer::class)
            ->needs('$sessionKey')
            ->give(function () {
                return $this->app['config']->get('referer.session_key');
            });

        $this->app->when(Referer::class)
            ->needs('$sources')
            ->give(function () {
                return $this->app['config']->get('referer.sources', []);
            });

        $this->app->singleton(Referer::class);
        $this->app->alias(Referer::class, 'referer');
    }
}
