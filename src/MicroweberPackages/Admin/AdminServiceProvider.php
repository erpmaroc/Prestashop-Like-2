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

namespace depexorPackages\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::addNamespace('admin', __DIR__.'/resources/views');

//        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
//        $this->loadMigrationsFrom(__DIR__ . '/database/');
    }
}
