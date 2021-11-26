<?php
namespace depexorPackages\Config\tests;

use Illuminate\Support\Facades\Config;
use depexorPackages\Config\ConfigSave;
use depexorPackages\Core\tests\TestCase;

class ConfigSaveTest extends TestCase
{
    public function testSimple()
    {
        Config::set('depexor.firstName', 'Bozhidar');
        Config::set('depexor.lastName', 'Slaveykov');

        Config::save(['depexor']);

        $this->assertEquals('Bozhidar', Config::get('depexor.firstName'));
        $this->assertEquals('Slaveykov', Config::get('depexor.lastName'));

        $defaultDir = $this->app->configPath();
        $configFile = $defaultDir . DIRECTORY_SEPARATOR . $this->app->environment(). DIRECTORY_SEPARATOR . 'depexor.php';

        $this->assertTrue(is_file($configFile));

        $configFileContent = include($configFile);

        $this->assertNotEmpty($configFileContent);

        $this->assertEquals('Bozhidar', $configFileContent['firstName']);
        $this->assertEquals('Slaveykov', $configFileContent['lastName']);

    }

}