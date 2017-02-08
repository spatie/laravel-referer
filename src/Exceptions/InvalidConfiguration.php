<?php

namespace Spatie\Referer\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function emptySessionKey(): self
    {
        return new self("`referer.session_key` can't be empty");
    }
}
