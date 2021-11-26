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

namespace depexorPackages\Option\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use depexorPackages\Menu\TranslateTables\TranslateMenu;
use depexorPackages\Option\TranslateTables\TranslateOption;
use depexorPackages\Option\Facades\Option as OptionFacade;
use depexorPackages\Option\GlobalOptions;
use depexorPackages\Option\Models\Option as OptionModel;
use depexorPackages\Option\Models\Option;
use depexorPackages\Option\OptionManager;
use depexorPackages\Option\Repositories\OptionRepository;


class OptionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('option_manager', function ($app) {
            return new OptionManager();
        });

        $this->app->bind('option',function(){
            return new OptionModel();
        });

        $this->app->singleton('global_options', function ($app) {
            return new GlobalOptions(OptionModel::all());
        });


        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Option::class, function () {
                return new OptionRepository();
            });
        });

        /**
         * @property OptionRepository   $option_repository
         */
        $this->app->bind('option_repository', function () {
            return app()->make(OptionRepository::class);
        });

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . '/migrations/');

        $this->app->translate_manager->addTranslateProvider(TranslateOption::class);

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('Option', OptionFacade::class);

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['option_manager', 'option'];
    }
}
