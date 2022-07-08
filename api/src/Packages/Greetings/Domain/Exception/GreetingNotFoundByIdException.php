<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Domain\Exception;

use App\Packages\Common\Domain\Exception\DomainException;

class GreetingNotFoundByIdException extends DomainException
{
    public function __construct($id) {
        parent::__construct("Greeting with ID: {$id} was not found");
    }
}
