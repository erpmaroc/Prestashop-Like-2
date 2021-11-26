<?php
namespace depexorPackages\Config\tests;

class ConfigSaveServiceProviderTest extends BaseTest
{
	public function testConfigIsConfigSaveWhenUsing(){

		$this->assertInstanceOf(\depexorPackages\Config\ConfigSave::class, app('Config'));
	}

}