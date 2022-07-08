<?php

declare(strict_types=1);

namespace App\Packages\Common\Domain\Values;

use App\Packages\Common\Domain\Exception\InvalidCommonIdException;
use App\Packages\Common\Domain\Exception\InvalidCommonIntegerPositiveOrZeroException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
abstract class CommonId extends CommonIntegerPositiveOrZero
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected int $value;

    /**
     * @param int $value
     * @throws InvalidCommonIdException
     */
    public function __construct(int $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidCommonIntegerPositiveOrZeroException $e) {
            throw new InvalidCommonIdException($value, $e->getCode(), $e);
        }
    }

    public function value(): int
    {
        return $this->value;
    }
}
