<?php

namespace App\Packages\Greetings\Domain;

use App\Packages\Greetings\Domain\Values\GreetingId;
use App\Packages\Greetings\Domain\Values\GreetingName;
use App\Packages\Greetings\Infrastructure\Doctrine\DoctrineGreetingRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=DoctrineGreetingRepository::class)
 * @ORM\Table(name="greeting")
 */
class Greeting
{
    /**
     * @ORM\Embedded(class="App\Packages\Greetings\Domain\Values\GreetingId", columnPrefix=false)
     */
    public GreetingId $id;

    /**
     * @ORM\Embedded(class="App\Packages\Greetings\Domain\Values\GreetingName", columnPrefix=false)
     */
    private GreetingName $name;

    public function __construct(GreetingId $id, GreetingName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): GreetingId
    {
        return $this->id;
    }

    public function id(): GreetingId
    {
        return $this->id;
    }

    public function getName(): GreetingName
    {
        return $this->name;
    }
}
