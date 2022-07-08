<?php

declare(strict_types=1);

namespace App\Packages\Common\Infrastructure\Exception;

use Exception;
use Throwable;

final class InvalidRequestException extends Exception {
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Invalid request. ".strstr($message, 'response:'), $code, $previous);
    }
}
