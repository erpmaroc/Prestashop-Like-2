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

namespace depexorPackages\CustomField\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\CustomField\Listeners\AddCustomFieldProductListener;
use depexorPackages\CustomField\Listeners\EditCustomFieldProductListener;
use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasUpdated;

class CustomFieldEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ContentWasCreated::class => [
            AddCustomFieldProductListener::class
        ],
        ContentWasUpdated::class => [
            EditCustomFieldProductListener::class
        ]
    ];
}

