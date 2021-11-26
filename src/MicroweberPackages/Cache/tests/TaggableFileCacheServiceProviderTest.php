<?php

class TaggableFileCacheServiceProviderTest extends BaseTest
{
	public function testCacheIsTaggableFileCacheWhenUsing(){

		$this->assertInstanceOf(\depexorPackages\Cache\TaggableFileStore::class, app('cache')->store()->getStore());
	}

}