<?php

namespace Spatie\Referer;

use Illuminate\Http\Request;
use Spatie\Referer\Helpers\Url;
use Illuminate\Contracts\Session\Session;
use Spatie\Referer\Exceptions\InvalidConfiguration;

class Referer
{
    /** @var string */
    protected $key;

    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    public function __construct(string $key, Session $session)
    {
        if (empty($key)) {
            throw InvalidConfiguration::emptyKey();
        }

        $this->key = $key;
        $this->session = $session;
    }

    public function get(): string
    {
        return $this->session->get($this->key, '');
    }

    public function forget()
    {
        $this->session->forget($this->key);
    }

    public function put(string $referer)
    {
        return $this->session->put($this->key, $referer);
    }

    public function putFromRequest(Request $request)
    {
        $referer = $this->determineFromRequest($request);

        if (! empty($referer)) {
            $this->put($referer);
        }
    }

    protected function determineFromRequest(Request $request): string
    {
        if ($this->shouldCapture('utm_source') && $request->has('utm_source')) {
            return $request->get('utm_source');
        }

        if (! $this->shouldCapture('referer_header')) {
            return '';
        }

        $referer = $request->header('referer', '');

        if (empty($referer)) {
            return '';
        }

        $refererHost = Url::host($referer);

        if (empty($refererHost)) {
            return '';
        }

        if ($refererHost === $request->getHost()) {
            return '';
        }

        return $refererHost;
    }

    protected function shouldCapture(string $source): bool
    {
        return config("referer.sources.{$source}", false);
    }
}
