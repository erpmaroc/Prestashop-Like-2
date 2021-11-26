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

namespace depexorPackages\Queue\Providers;

use Illuminate\Support\ServiceProvider;

class QueueServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
        app()->terminating(function () {
            $scheduler = new Event();
            $scheduler->registerShutdownEvent(function () {
                app()->make("\depexorPackages\Queue\Http\Controllers\ProcessQueueController")->handle();
            });
        });*/

    }
}

