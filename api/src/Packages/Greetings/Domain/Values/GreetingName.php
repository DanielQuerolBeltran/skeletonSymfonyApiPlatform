<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Domain\Values;

use App\Packages\Common\Domain\Values\CommonString;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class GreetingName extends CommonString
{
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected string $value;
}
