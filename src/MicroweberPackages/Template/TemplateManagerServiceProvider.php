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

namespace depexorPackages\Template;

use Illuminate\Support\ServiceProvider;


class TemplateManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Template\TemplateManager    $template_manager
         */
        $this->app->singleton('template_manager', function ($app) {
            return new TemplateManager();
        });

        /**
         * @property \depexorPackages\Template\layoutsManager    $layouts_manager
         */
        $this->app->singleton('layouts_manager', function ($app) {
            return new LayoutsManager();
        });

        /**
         * @property \depexorPackages\Template\Template    $template
         */
        $this->app->singleton('template', function ($app) {
            return new Template();
        });
    }
}
