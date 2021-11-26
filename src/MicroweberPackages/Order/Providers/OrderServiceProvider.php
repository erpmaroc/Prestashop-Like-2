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

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use depexorPackages\Module\Facades\ModuleManager;
use depexorPackages\Order\Http\Controllers\OrdersController;
use depexorPackages\Order\OrderManager;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Order    $order_manager
         */
        $this->app->singleton('order_manager', function ($app) {
            return new OrderManager();
        });

        View::addNamespace('order', dirname(__DIR__) . '/resources/views');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/web.php');
        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/api.php');


    }
}