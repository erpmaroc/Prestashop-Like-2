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

namespace depexorPackages\Database;

use Illuminate\Support\ServiceProvider;


class DatabaseManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Database\DatabaseManager    $database_manager
         */
        $this->app->singleton('database_manager', function ($app) {
            return new DatabaseManager($app);
        });


        \Event::listen(['eloquent.saved: *', 'eloquent.created: *', 'eloquent.deleted: *'], function ($context) {
            app()->database_manager->clearCache();
        });


    }
}
