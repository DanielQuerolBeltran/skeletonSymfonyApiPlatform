<?php

declare(strict_types=1);


namespace App\Tests\Tools;


use Nelmio\Alice\Loader\NativeLoader;
use Symfony\Component\HttpKernel\KernelInterface;

final class DatabaseFixtureLoader
{
    /**
     * @param KernelInterface $kernel
     * @param array $files
     * @return object[]
     */
    public static function load(KernelInterface $kernel, array $files): array {
        $loader = $kernel->getContainer()->get('fidry_alice_data_fixtures.loader.doctrine');

        return $loader->load($files);
    }

    public static function loadWithoutPersisting(string $file): array
    {
        $loader = new NativeLoader();

        return $loader->loadFile($file)->getObjects();
    }
}