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

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Allow to overwrite resource files for this module
        $checkForOverwrite = template_dir() . 'modules/shop/src/resources/views';
        $checkForOverwrite = normalize_path($checkForOverwrite);

        if (is_dir($checkForOverwrite)) {
            View::addNamespace('shop', $checkForOverwrite);
        }

        View::addNamespace('shop', normalize_path((__DIR__) . '/resources/views'));

    }

    public function register()
    {
        $this->loadRoutesFrom((__DIR__) . '/routes/web.php');
    }
}
