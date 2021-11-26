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


namespace depexorPackages\Cart\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Cart\Listeners\UserLoginListener;

class CartEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        Login::class => [
            UserLoginListener::class,
        ],
        Registered::class => [
            UserLoginListener::class,
        ]
    ];
}
