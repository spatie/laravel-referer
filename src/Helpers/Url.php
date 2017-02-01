<?php

namespace Spatie\Referer\Helpers;

class Url
{
    public static function host(string $url): string
    {
        $parts = parse_url($url);

        if ($parts === false || ! isset($parts['host'])) {
            return '';
        }

        return $parts['host'];
    }
}
