<?php

namespace depexorPackages\Offer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use depexorPackages\Product\Events\ProductWasCreated;
use depexorPackages\Product\Events\ProductWasUpdated;
use depexorPackages\Offer\Listeners\AddSpecialPriceProductListener;
use depexorPackages\Offer\Listeners\EditSpecialPriceProductListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ProductWasCreated::class => [
            AddSpecialPriceProductListener::class
        ],
        ProductWasUpdated::class => [
            EditSpecialPriceProductListener::class
        ]
    ];
}