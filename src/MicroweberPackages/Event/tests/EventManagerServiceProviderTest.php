<?php
namespace depexorPackages\Event\EventManager\tests;

class EventManagerServiceProviderTest extends BaseTest
{
	public function testEventManagerWhenUsing() {
		$this->assertInstanceOf(\depexorPackages\Event\Event::class, app('event_manager'));
	}
}