<?php

declare(strict_types=1);

namespace App\Packages\Greetings\Infrastructure\Doctrine;

use App\Packages\Common\Domain\Exception\ErrorPersistingEntity;
use App\Packages\Greetings\Domain\Exception\GreetingNotFoundByIdException;
use App\Packages\Greetings\Domain\Greeting;
use App\Packages\Greetings\Domain\Repository\GreetingRepository;
use App\Packages\Greetings\Domain\Values\GreetingId;
use App\Packages\Greetings\Domain\Values\GreetingName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Greeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Greeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Greeting[]    findAll()
 * @method Greeting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineGreetingRepository extends ServiceEntityRepository implements GreetingRepository
{
    public function __construct(
        ManagerRegistry $registry
    )
    {
        parent::__construct($registry, Greeting::class);
    }

    public function get(GreetingId $id): Greeting
    {
        $greeting = $this->findOneBy(['id.value' => $id->value()]);

        if (empty($greeting)) {
            throw new GreetingNotFoundByIdException($id);
        }

        return $greeting;
    }


    public function save(Greeting $greeting): Greeting
    {
        $em = $this->getEntityManager();
        try {
            $em->persist($greeting);
            $em->flush();
        } catch (ORMException $e) {
            throw new ErrorPersistingEntity($e->getMessage(), $e->getCode(), $e);
        }

        return $this->findOneBy(['id.value' => $greeting->getId()->value()]);
    }
}
