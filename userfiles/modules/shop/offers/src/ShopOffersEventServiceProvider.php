<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 9/24/2020
 * Time: 3:38 PM
 */

namespace depexorPackages\Shop\Offers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Product\Events\ProductWasCreated;
use depexorPackages\Product\Events\ProductWasUpdated;
use depexorPackages\Shop\Offers\Listeners\AddSpecialPriceProductListener;
use depexorPackages\Shop\Offers\Listeners\EditSpecialPriceProductListener;


class ShopOffersEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ProductWasCreated::class => [
            AddSpecialPriceProductListener::class
        ],
        ProductWasUpdated::class => [
            EditSpecialPriceProductListener::class
        ]
    ];
}