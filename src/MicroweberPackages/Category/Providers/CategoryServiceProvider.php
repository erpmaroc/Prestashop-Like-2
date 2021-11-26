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

namespace depexorPackages\Category\Providers;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Category\CategoryManager;
use depexorPackages\Category\Models\Category;
use depexorPackages\Category\Models\CategoryItem;
use depexorPackages\Category\Repositories\CategoryRepository;
use depexorPackages\Database\Observers\BaseModelObserver;
use Illuminate\Contracts\Support\DeferrableProvider;
use depexorPackages\Category\TranslateTables\TranslateCategory;

class CategoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->translate_manager->addTranslateProvider(TranslateCategory::class);

        /**
         * @property \depexorPackages\Category\CategoryManager    $category_manager
         */
        $this->app->singleton('category_manager', function ($app) {
            return new CategoryManager();
        });

        Category::observe(BaseModelObserver::class);
        CategoryItem::observe(BaseModelObserver::class);

        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');

        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Category::class, function () {
                return new CategoryRepository();
            });
        });

        /**
         * @property CategoryRepository   $category_repository
         */
        $this->app->bind('category_repository', function ($app) {
            return $this->app->repository_manager->driver(Category::class);;
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['category_manager'];
    }

}

