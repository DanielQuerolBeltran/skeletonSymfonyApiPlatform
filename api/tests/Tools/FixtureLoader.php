<?php

declare(strict_types=1);

namespace App\Tests\Tools;

use Nelmio\Alice\Loader\NativeLoader;
use Nelmio\Alice\Throwable\LoadingThrowable;

final class FixtureLoader
{
    /**
     * @param string $file
     *
     * @return array
     *
     * @throws LoadingThrowable
     */
    public static function load(string $file): array
    {
        return (new NativeLoader())->loadFile($file)->getObjects();
    }
}
