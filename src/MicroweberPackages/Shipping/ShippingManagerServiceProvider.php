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

namespace depexorPackages\Shipping;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use depexorPackages\Application;

class ShippingManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Shipping\ShippingManager $shipping_manager
         */

        $this->app->singleton('shipping_manager', function ($app) {
            /**
             * @var Application $app
             */
            return new ShippingManager($app->make(Container::class));
        });


        //add drivers

      /*  $this->app->resolving(\depexorPackages\Shipping\ShippingManager::class, function (\depexorPackages\Shipping\ShippingManager $shippingManager) {

            $shippingManager->extend('pickup', function () {
                return new \depexorPackages\Shipping\Providers\PickupDriver();
            });

        });*/

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');




        //   $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}