<?php

namespace Spatie\Referer\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function emptyKey(): self
    {
        return new self("`referer.key` can't be empty");
    }
}
