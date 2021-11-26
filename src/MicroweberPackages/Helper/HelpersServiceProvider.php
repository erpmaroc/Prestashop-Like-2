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

namespace depexorPackages\Helper;

use Illuminate\Support\ServiceProvider;


class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		
        /**
         * @property \depexorPackages\Helper\Format    $format
         */
        $this->app->singleton('format', function () {
            return new Format();
        });

		/**
         * @property \depexorPackages\Helper\XSSSecurity    $xss_security
         */
        $this->app->singleton('xss_security', function () {
            return new XSSSecurity();
        });

        /**
         * @property \depexorPackages\Helper\UrlManager    $url_manager
         */
        $this->app->singleton('url_manager', function () {
            return new UrlManager();
        });
    }
}
