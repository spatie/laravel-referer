<?php

namespace Spatie\Referer;

use Closure;

class CaptureReferer
{
    /** @var \Spatie\Referer\Referer */
    protected $referer;

    public function __construct(Referer $referer)
    {
        $this->referer = $referer;
    }

    public function handle($request, Closure $next)
    {
        $this->referer->putFromRequest($request);

        return $next($request);
    }
}
