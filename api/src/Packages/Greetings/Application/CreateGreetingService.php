<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Application;

use App\Packages\Common\Application\Exception\InvalidResourceException;
use App\Packages\Common\Application\Exception\PersistenceErrorException;
use App\Packages\Common\Application\Exception\ResourceNotFoundException;
use App\Packages\Common\Domain\Exception\ErrorPersistingEntity;
use App\Packages\Greetings\Application\DTO\GreetingDTO;
use App\Packages\Greetings\Domain\Exception\GreetingNotFoundByIdException;
use App\Packages\Greetings\Domain\Exception\InvalidGreetingIdException;
use App\Packages\Greetings\Domain\Greeting;
use App\Packages\Greetings\Domain\Repository\GreetingRepository;
use App\Packages\Greetings\Domain\Values\GreetingId;
use App\Packages\Greetings\Domain\Values\GreetingName;
use Symfony\Component\Uid\Uuid;

class CreateGreetingService
{
    public function __construct(
        private GreetingRepository $repository)
    {
    }

    /**
     * @throws InvalidResourceException
     * @throws PersistenceErrorException
     */
    public function __invoke(string $name): GreetingDTO
    {
        try {
            return GreetingDTO::assemble(
                $this->repository->save(
                    new Greeting(
                        new GreetingId((string)Uuid::v4()),
                        new GreetingName($name)
                    )
                )
            );
        } catch (InvalidGreetingIdException $e) {
            throw new InvalidResourceException($e->getMessage(), $e->getCode(), $e);
        } catch (ErrorPersistingEntity $e) {
            throw new PersistenceErrorException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
