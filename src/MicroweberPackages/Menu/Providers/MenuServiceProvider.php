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

namespace depexorPackages\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Menu\Menu;
use depexorPackages\Menu\MenuManager;
use depexorPackages\Menu\Repositories\MenuRepository;
use depexorPackages\Menu\TranslateTables\TranslateMenu;
use depexorPackages\Multilanguage\TranslateTablesRegistrator;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->translate_manager->addTranslateProvider(TranslateMenu::class);

        /**
         * @property \depexorPackages\Menu\MenuManager    $menu_manager
         */
        $this->app->singleton('menu_manager', function ($app) {
            return new MenuManager();
        });

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');


        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Menu::class, function () {
                return new MenuRepository();
            });
        });

        /**
         * @property MenuRepository   $menu_repository
         */
        $this->app->bind('menu_repository', function ($app) {
            return $this->app->repository_manager->driver(Menu::class);;
        });
    }
}
