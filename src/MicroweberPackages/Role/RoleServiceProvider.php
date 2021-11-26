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

namespace depexorPackages\Role;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use depexorPackages\Role\Http\Controllers\IndexController;
use depexorPackages\Role\Http\Controllers\RoleController;


class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::addNamespace('role', __DIR__.'/resources/views');

        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }
}