<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Exception;

use Throwable;

final class InvalidCommonIdException extends DomainException
{

    /**
     * InvalidCommonIdException constructor.
     *
     * @param int $id
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(int $id, int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid ID: {$id}", $code, $previous);
    }
}
