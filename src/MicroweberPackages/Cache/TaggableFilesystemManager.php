<?php

namespace depexorPackages\Cache;

use Illuminate\Filesystem\Filesystem;
use depexorPackages\Cache\CacheFileHandler\MemoryCacheFileHandler;

class TaggableFilesystemManager extends Filesystem
{

    public $cachedDataMemory = [];
    public $tagMapCacheMemory = [];
    public $tagMapPathsCacheMemory = [];
    public $cacheHandler = null;
    public function __construct()
    {

        //$this->cacheHandler = new CacheFileHandler();
        $this->cacheHandler = new MemoryCacheFileHandler();

    }

}