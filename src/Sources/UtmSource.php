<?php

namespace Spatie\Referer\Sources;

use Illuminate\Http\Request;
use Spatie\Referer\Source;

class UtmSource implements Source
{
    public function getReferer(Request $request): string
    {
        return $request->get('utm_source') ?? '';
    }
}
