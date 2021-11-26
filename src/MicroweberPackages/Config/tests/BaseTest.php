<?php
namespace depexorPackages\Config\tests;

use Orchestra\Testbench\TestCase;

abstract class BaseTest extends TestCase
{

    public function tearDown(): void
    {
        \Mockery::close();
    }


    protected function getPackageProviders($app)
    {
        return [\depexorPackages\Config\ConfigSaveServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Config' => \depexorPackages\Config\ConfigSaveFacade::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'tQbgKF5NH5zMyGh4vCNypFAzx9trCkE6x');
    }

}