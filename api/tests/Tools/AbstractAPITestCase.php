<?php

declare(strict_types=1);

namespace App\Tests\Tools;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
use Doctrine\ORM\EntityManagerInterface;

class AbstractAPITestCase extends ApiTestCase
{

    private const API_OPTIONS_DEFAULTS = [
        'base_uri' => 'http://localhost',
    ];

    protected function getClient(): Client {
        return static::createClient([], self::API_OPTIONS_DEFAULTS);
    }

    /**
     * @param array $files
     * @return object[]
     */
    protected function loadFixtures(array $files): array
    {
        foreach($files as &$file) {
            $file = static::bootKernel()->getProjectDir() ."/".$file;
        }

        return DatabaseFixtureLoader::load(static::$kernel, $files);
    }

    protected function entityManager(): EntityManagerInterface {
        return self::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    protected function repository(string $entity) {
        return $this->entityManager()->getRepository($entity);
    }
}
