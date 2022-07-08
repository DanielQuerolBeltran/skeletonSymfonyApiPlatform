<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Application\DTO;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Packages\Greetings\Domain\Greeting;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource]
final class GreetingDTO
{
    public function __construct(
        #[Groups(['greeting:readItem'])]
        public string $id,
        #[Groups(['greeting:readItem'])]
        public string $name
    )
    {
    }

    public static function assemble(Greeting $greeting): self
    {
        return new self(
            $greeting->getId()->value(),
            $greeting->getName()->value()
        );
    }
}
