<?php

namespace App\Packages\Greetings\Domain\Repository;

use App\Packages\Greetings\Domain\Exception\GreetingNotFoundByIdException;
use App\Packages\Greetings\Domain\Greeting;
use App\Packages\Greetings\Domain\Values\GreetingId;

interface GreetingRepository
{
    /**
     * @param GreetingId $id
     * @return Greeting
     * @throws GreetingNotFoundByIdException
     */
    public function get(GreetingId $id): Greeting;
}
