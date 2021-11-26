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

namespace depexorPackages\Utils\Captcha\Providers;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Utils\Captcha\CaptchaManager;
use depexorPackages\Utils\Captcha\Validators\CaptchaValidator;


class CaptchaManagerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @property \depexorPackages\Utils\Captcha\CaptchaManager $captcha_manager
         */
        $this->app->singleton('captcha_manager', function ($app) {
            return new CaptchaManager();
        });

        \Validator::extendImplicit('captcha', CaptchaValidator::class.'@validate', 'Invalid captcha answer!');



    }
}
