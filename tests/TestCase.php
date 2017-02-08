<?php

namespace Spatie\Referer\Test;

use Spatie\Referer\Referer;
use Spatie\Referer\CaptureReferer;
use Spatie\Referer\RefererServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    /** @var \Spatie\Referer\Referer */
    protected $referer;

    public function setUp()
    {
        parent::setUp();

        $this->app['config']->set('app.url', 'https://mysite.com');

        $this->app['router']->get('/')->middleware(CaptureReferer::class, function () {
            return response(null, 200);
        });

        $this->session = $this->app['session.store'];
        $this->referer = $this->app['referer'];
    }

    protected function getPackageProviders($app)
    {
        return [
            RefererServiceProvider::class,
        ];
    }

    protected function withConfig(array $config)
    {
        $this->app['config']->set($config);

        $this->app->forgetInstance(Referer::class);

        $this->referer = $this->app->make(Referer::class);
    }
}
