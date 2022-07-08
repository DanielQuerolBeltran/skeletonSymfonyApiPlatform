<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Values;

use App\Packages\Common\Domain\Exception\InvalidCommonIdException;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Uuid;

/**
 * @ORM\Embeddable()
 */
abstract class CommonId
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="uuid", nullable=false)
     */
    protected string $value;

    /**
     * @throws InvalidCommonIdException
     */
    public function __construct(string $value) {
        if (!$this->validateUuid($value)) {
            throw new InvalidCommonIdException($value);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validateUuid(string $value): bool {
        return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $value) === 1;
    }
}
