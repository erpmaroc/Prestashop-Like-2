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

namespace depexorPackages\Category\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Category\Listeners\AddCategoryListener;
use depexorPackages\Category\Listeners\EditCategoryListener;
use depexorPackages\Post\Events\PostWasCreated;
use depexorPackages\Post\Events\PostWasUpdated;
use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasUpdated;

class CategoryEventServiceProvider extends EventServiceProvider
{

    /**
     * @deprecated

        protected $listen = [
        ContentWasCreated::class => [
            AddCategoryListener::class
        ],
        ContentWasUpdated::class => [
            EditCategoryListener::class
        ],
        PostWasCreated::class => [
            AddCategoryListener::class
        ],
        PostWasUpdated::class => [
            EditCategoryListener::class
        ],
    ];*/

}

