<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Values;

abstract class CommonString {
    protected string $value;

    public function __construct(string $value) {
        $this->value = $value;
    }

    public function value(): string {
        return $this->value;
    }
}
