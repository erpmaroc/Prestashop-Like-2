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

namespace depexorPackages\Cart;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use depexorPackages\Cart\Models\Cart;
use depexorPackages\Cart\Repositories\CartRepository;

class CartManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {

        /**
         * @property \depexorPackages\Cart\CartManager    $cart_manager
         */
        $this->app->singleton('cart_manager', function ($app) {
            return new CartManager();
        });



        $this->app->resolving(\depexorPackages\Repository\RepositoryManager::class, function (\depexorPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(Cart::class, function () {
                return new CartRepository();
            });
        });


        /**
         * @property CartRepository   $cart_repository
         */
        $this->app->bind('cart_repository', function () {
            return $this->app->repository_manager->driver(Cart::class);;
        });


    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cart_manager'];
    }
}