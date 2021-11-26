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

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\User\Listeners\RecordAuthenticatedLoginListener;
use depexorPackages\User\Listeners\RecordFailedLoginAttemptListener;
use depexorPackages\User\Listeners\UserRegisteredListener;
use depexorPackages\User\Notifications\SendEmailVerificationNotificationOnRegister;

class UserEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotificationOnRegister::class,
            UserRegisteredListener::class
        ],
        \Illuminate\Auth\Events\Failed::class => [
            RecordFailedLoginAttemptListener::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            RecordAuthenticatedLoginListener::class,
        ]
    ];
}
