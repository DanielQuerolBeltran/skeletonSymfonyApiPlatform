<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Domain\Exception;

use App\Packages\Common\Domain\Exception\DomainException;
use Throwable;

class InvalidGreetingIdException extends DomainException
{
    public function __construct($value, int $code = 0, Throwable $previous = null) {
        parent::__construct("Invalid ID: '{$value}'", $code, $previous);
    }
}
