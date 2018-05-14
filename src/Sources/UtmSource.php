<?php

namespace Spatie\Referer\Sources;

use Spatie\Referer\Source;
use Illuminate\Http\Request;

class UtmSource implements Source
{
    public function getReferer(Request $request): string
    {
        return $request->get('utm_source') ?? '';
    }
}
