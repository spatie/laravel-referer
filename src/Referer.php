<?php

namespace Spatie\Referer;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Spatie\Referer\Exceptions\InvalidConfiguration;

class Referer
{
    /** @var string */
    protected $sessionKey;

    /** @var array */
    protected $sources;

    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    public function __construct(string $sessionKey, array $sources, Session $session)
    {
        if (empty($sessionKey)) {
            throw InvalidConfiguration::emptySessionKey();
        }

        $this->sessionKey = $sessionKey;
        $this->sources = $sources;
        $this->session = $session;
    }

    public function get(): string
    {
        return $this->session->get($this->sessionKey, '');
    }

    public function forget()
    {
        $this->session->forget($this->sessionKey);
    }

    public function put(string $referer)
    {
        return $this->session->put($this->sessionKey, $referer);
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
