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

namespace depexorPackages\Customer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Customer\Listeners\CreateCustomerFromOrderListener;
use depexorPackages\Order\Events\OrderWasCreated;

class CustomerEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        OrderWasCreated::class => [
            CreateCustomerFromOrderListener::class
        ]
    ];
}

