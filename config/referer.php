<?php

return [

    /*
     * The key that will be used to remember the referer in the session.
     */
    'session_key' => 'referer',

    /*
     * The sources used to determine the referer.
     */
    'sources' => [
        Spatie\Referer\Sources\UtmSource::class,
        Spatie\Referer\Sources\RequestHeader::class,
    ],
];
