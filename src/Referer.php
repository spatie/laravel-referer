<?php

namespace Spatie\Referer;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Spatie\Referer\Helpers\Url;

class Referer
{
    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function putFromRequest(Request $request)
    {
        $referer = $this->determineFromRequest($request);

        if (! empty($referer)) {
            $this->session->put('referer', $referer);
        }
    }

    public function get(): string
    {
        return $this->session->get('referer', '');
    }

    public function forget()
    {
        $this->session->forget('referer');
    }

    protected function determineFromRequest(Request $request): string
    {
        if ($request->has('utm_source')) {
            return $request->get('utm_source');
        }

        $referer = $request->server('HTTP_REFERER', '');

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

        return $referer;
    }
}
