<?php

namespace Spatie\Referer;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Spatie\Referer\Exceptions\InvalidConfiguration;

class Referer
{
    /** @var string */
    protected $key;

    /** @var array */
    protected $sources;

    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    public function __construct(string $key, array $sources, Session $session)
    {
        if (empty($key)) {
            throw InvalidConfiguration::emptyKey();
        }

        $this->key = $key;
        $this->sources = $sources;
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
        foreach ($this->sources as $source) {
            if ($referer = (new $source)->getReferer($request)) {
                return $referer;
            }
        }

        return '';
    }
}
