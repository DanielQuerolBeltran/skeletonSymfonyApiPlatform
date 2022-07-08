<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Values;

use App\Packages\Common\Domain\Exception\InvalidCommonIntegerPositiveOrZeroException;

abstract class CommonIntegerPositiveOrZero
{
    protected int $value;

    /**
     * @throws InvalidCommonIntegerPositiveOrZeroException
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            throw new InvalidCommonIntegerPositiveOrZeroException($value);
        }

        if ($value <= -1) {
            throw new InvalidCommonIntegerPositiveOrZeroException($value);
        }

       $this->value = $value;
    }
}
