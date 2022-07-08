<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Exception;

use Throwable;

class InvalidCommonIntegerPositiveOrZeroException extends DomainException
{
    /**
     * InvalidCommonIntegerPositiveException constructor.
     *
     * @param mixed $value Value
     * @param int $code exception code
     * @param Throwable|null $previous previous exception
     */
    public function __construct($value, $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid integer positive or zero. Value: {$value}", $code, $previous);
    }
}
