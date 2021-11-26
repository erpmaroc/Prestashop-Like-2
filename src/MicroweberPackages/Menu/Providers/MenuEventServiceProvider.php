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

namespace depexorPackages\Menu\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Menu\Listeners\AddMenuPageListener;
use depexorPackages\Menu\Listeners\EditMenuPageListener;
use depexorPackages\Page\Events\MenuWasCreated;
use depexorPackages\Page\Events\MenuWasUpdated;

class MenuEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        MenuWasCreated::class => [
            AddMenuPageListener::class
        ],
        MenuWasUpdated::class => [
            EditMenuPageListener::class
        ]
    ];
}

