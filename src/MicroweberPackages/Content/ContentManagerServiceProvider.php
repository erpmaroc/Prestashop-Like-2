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

namespace depexorPackages\Content;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Content\Repositories\ContentRepositoryApi;
use depexorPackages\Content\Repositories\ContentRepositoryManager;
use depexorPackages\Content\Repositories\ContentRepository;
use depexorPackages\Repository\Controllers\ContentRepositoryController;


class ContentManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {

        /**
         * @property ContentRepository   $content_repository
         */
        $this->app->bind('content_repository', function ($app) {
            return $this->app->repository_manager->driver(Content::class);;
        });


        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Content::class, function () {
                return new ContentRepository();
            });
        });


        /**
         * @property \depexorPackages\Content\ContentManager    $content_manager
         */
        $this->app->singleton('content_manager', function ($app) {
            return new ContentManager();
        });

        /**
         * @property \depexorPackages\Content\DataFieldsManager    $data_fields_manager
         */
        $this->app->singleton('data_fields_manager', function ($app) {
            return new DataFieldsManager();
        });

        /**
         * @property \depexorPackages\Content\AttributesManager    $attributes_manager
         */
        $this->app->singleton('attributes_manager', function ($app) {
            return new AttributesManager();
        });


        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
    }
}
