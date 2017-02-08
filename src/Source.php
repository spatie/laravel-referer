<?php

namespace Spatie\Referer;

use Illuminate\Http\Request;

interface Source
{
    /**
     * Retrieve a referer from a request. If no referer was found, return an empty string.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function getReferer(Request $request): string;
}
