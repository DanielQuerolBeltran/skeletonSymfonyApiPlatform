<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Domain\Values;

use App\Packages\Common\Domain\Exception\InvalidCommonIdException;
use App\Packages\Common\Domain\Values\CommonId;
use App\Packages\Greetings\Domain\Exception\InvalidGreetingIdException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class GreetingId extends CommonId
{
    /**
     * @throws InvalidGreetingIdException
     */
    public function __construct(int $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidCommonIdException $e) {
            throw new InvalidGreetingIdException($value, $e->getCode(), $e);
        }
    }
}
