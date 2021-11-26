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

namespace depexorPackages\Debugbar;

use Illuminate\Support\ServiceProvider;

class DebugbarServiceProvider extends ServiceProvider
{
    public function register()
    {

        /*
         * Sets third party service providers that are only needed on local/testing environments
         */
        //  if ($this->app->environment() != 'production') {
        /**
         * Loader for registering facades.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        /*
         * Load third party local providers
         */
        $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);

        /*
         * Load third party local aliases
         */
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
        // }
    }

    public function boot()
    {


        if (!\Config::get('debugbar.enabled')) {
            \Debugbar::disable();
        }
    }
}
