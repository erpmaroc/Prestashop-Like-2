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

namespace depexorPackages\Module;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton('module_manager', function ($app) {
            return new ModuleManager();
        });

        $this->app->bind('module',function(){
            return new Module();
        });


        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Module::class, function () {
                return new \depexorPackages\Module\Repositories\ModuleRepository();
            });
        });



        /**
         * @property ModuleRepository   $module_repository
         */
        $this->app->bind('module_repository', function () {
            return $this->app->repository_manager->driver(Module::class);;
        });







        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('ModuleManager', \depexorPackages\Module\Facades\ModuleManager::class);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');






    }
}
