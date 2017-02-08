<?php

namespace Spatie\Referer\Sources;

use Spatie\Referer\Source;
use Illuminate\Http\Request;
use Spatie\Referer\Helpers\Url;

class RequestHeader implements Source
{
    public function getReferer(Request $request): string
    {
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
}
