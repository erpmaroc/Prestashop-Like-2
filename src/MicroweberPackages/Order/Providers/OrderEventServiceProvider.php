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

namespace depexorPackages\Order\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Order\Events\OrderWasCreated;
use depexorPackages\Order\Events\OrderWasPaid;
use depexorPackages\Order\Listeners\OrderCreatedListener;
use depexorPackages\Order\Listeners\OrderWasPaidListener;

class OrderEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        OrderWasCreated::class => [
            OrderCreatedListener::class
        ],
        OrderWasPaid::class => [
            OrderWasPaidListener::class
        ],
    ];

}

