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

namespace depexorPackages\Shop;

use Illuminate\Support\ServiceProvider;

class ShopManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Shop    $shop_manager
         */
        $this->app->singleton('shop_manager', function ($app) {
            return new ShopManager();
        });

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}