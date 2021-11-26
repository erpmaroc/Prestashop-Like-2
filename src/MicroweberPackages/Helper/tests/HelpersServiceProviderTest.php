<?php
namespace depexorPackages\Helper\tests;

class HelpersServiceProviderTest extends BaseTest
{
	public function testFormatWhenUsing(){

		$this->assertInstanceOf(\depexorPackages\Helper\Format::class, app('format'));
	}
	
	public function testXSSSecurityWhenUsing(){

		$this->assertInstanceOf(\depexorPackages\Helper\XSSSecurity::class, app('xss_security'));
	}

}