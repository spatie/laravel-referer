<?php

return [

    /*
     * The key that will be used to remember the referer in the session.
     */
    'key' => 'referer',

    /*
     * The sources used to determine the referer.
     */
    'sources' => [
        'utm_source' => true,
        'referer_header' => true,
    ],

];
