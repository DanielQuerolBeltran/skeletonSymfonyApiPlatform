<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Application;

use App\Packages\Common\Application\Exception\InvalidResourceException;
use App\Packages\Common\Application\Exception\ResourceNotFoundException;
use App\Packages\Greetings\Application\DTO\GreetingDTO;
use App\Packages\Greetings\Domain\Exception\GreetingNotFoundByIdException;
use App\Packages\Greetings\Domain\Exception\InvalidGreetingIdException;
use App\Packages\Greetings\Domain\Repository\GreetingRepository;
use App\Packages\Greetings\Domain\Values\GreetingId;

class GetGreetingService
{
    public function __construct(
        private GreetingRepository $repository)
    {
    }

    /**
     * @throws ResourceNotFoundException
     * @throws InvalidResourceException
     */
    public function __invoke(string $id): GreetingDTO
    {
        try {
            return GreetingDTO::assemble($this->repository->get(new GreetingId($id)));
        } catch (GreetingNotFoundByIdException $e) {
            throw new ResourceNotFoundException($e->getMessage(), $e->getCode(), $e);
        } catch (InvalidGreetingIdException $e) {
            throw new InvalidResourceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
