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

namespace depexorPackages\User\Providers;

use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use depexorPackages\User\Services\RSAKeys;
use depexorPackages\User\UserManager;



class UserServiceProvider extends AuthServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
//    public function register()
//    {
//        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);
//        $this->app->register(\Laravel\Sanctum\SanctumServiceProvider::class);
//
//         parent::register();
//    }

    public function boot()
    {
        /**
         * @property \depexorPackages\User\UserManager $user_manager
         */

        [$publicKey, $privateKey] = [
            storage_path('oauth-public.key'),
            storage_path('oauth-private.key'),
        ];

        $need_to_generate_keys = false;
        if (!is_file($publicKey) or !is_file($privateKey)) {
            $need_to_generate_keys = true;
        }
        if ($need_to_generate_keys) {
            $keys = RSAKeys::createKey( 4096);
            file_put_contents($publicKey, \Arr::get($keys, 'publickey'));
            file_put_contents($privateKey, \Arr::get($keys, 'privatekey'));
        }


        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);
        $this->app->register(\Laravel\Sanctum\SanctumServiceProvider::class);




        $this->app->singleton('user_manager', function ($app) {
            return new UserManager();
        });


        View::addNamespace('user', __DIR__ . '/../resources/views');

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations/');


        // Register Validators
        Validator::extendImplicit(
            'terms',
            'depexorPackages\User\Validators\TermsValidator@validate',
            'Terms are not accepted');
        Validator::extendImplicit(
            'temporary_email_check',
            'depexorPackages\User\Validators\TemporaryEmailCheckValidator@validate',
            'You cannot register with email from this domain.');

    }
}
