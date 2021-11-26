<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 9/24/2020
 * Time: 3:38 PM
 */

namespace depexorPackages\Shop\Offers;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Product\Product;
use depexorPackages\Shop\Offers\Observers\ShopOffersObserver;

class ShopOffersServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
}