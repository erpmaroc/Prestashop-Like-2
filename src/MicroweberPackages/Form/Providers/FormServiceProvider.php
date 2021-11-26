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

namespace depexorPackages\Form\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use depexorPackages\CustomField\FieldsManager;
use depexorPackages\Form\FormsManager;
use Illuminate\Contracts\Support\DeferrableProvider;

class FormServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Form\FormsManager $forms_manager
         */
        $this->app->singleton('forms_manager', function ($app) {
            return new FormsManager();
        });

        /**
         * @property \depexorPackages\CustomField\FieldsManager $fields_manager
         */
        $this->app->singleton('fields_manager', function ($app) {
            return new FieldsManager();
        });

        Validator::extendImplicit('valid_image', 'depexorPackages\Form\Validators\ImageValidator@validate', 'Invalid image file');

        $this->loadMigrationsFrom(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'migrations/');
        $this->loadRoutesFrom(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes/api_public.php');

        View::addNamespace('form', dirname(__DIR__) . '/resources/views');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fields_manager','forms_manager'];
    }

}
