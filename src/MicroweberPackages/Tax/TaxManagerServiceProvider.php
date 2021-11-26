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

namespace depexorPackages\Tax;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TaxManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Tax    $tax_manager
         */
        $this->app->singleton('tax_manager', function ($app) {
            return new TaxManager();
        });


        View::addNamespace('tax', __DIR__.'/resources/views');

        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }
}