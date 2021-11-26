<?php
/*
 * This file is part of the depexor framework.
 *
 * (c) depexor CMS LTD
 *
 * For full license information see
 * https://github.com/depexor/depexor/blob/master/LICENSE
 *
 */

namespace depexorPackages\ContentData\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\ContentData\Listeners\AddContentDataProductListener;
use depexorPackages\ContentData\Listeners\EditContentDataProductListener;
use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasUpdated;
use depexorPackages\ContentData\Traits\ContentDataTrait;


/**
 * @deprecated moved to the ContentDataTrait
 */
class ContentDataEventServiceProvider extends EventServiceProvider
{
//    protected $listen = [
//        ContentWasCreated::class => [
//            AddContentDataProductListener::class
//        ],
//        ContentWasUpdated::class => [
//            EditContentDataProductListener::class
//        ]
//    ];
}

