<?php

namespace depexorPackages\Repository\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasUpdated;

class RepositoryEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ContentWasCreated::class => [
        //    AddContentDataProductListener::class
        ],
        ContentWasUpdated::class => [
        //    EditContentDataProductListener::class
        ]
    ];
}

