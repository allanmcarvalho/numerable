<?php

namespace Numerable\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Numerable\NumerableServiceProvider;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app): array
    {
        return [
            NumerableServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_numerable_table.php.stub';
        $migration->up();
        */
    }
}
