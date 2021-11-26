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

namespace depexorPackages\Queue\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Queue\Events\ProcessQueueEvent;
use depexorPackages\Queue\Listeners\ProcessQueueListener;
use depexorPackages\User\Listeners\RecordAuthenticatedLoginListener;
use depexorPackages\User\Listeners\RecordFailedLoginAttemptListener;
use depexorPackages\User\Listeners\UserRegisteredListener;

class QueueEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        ProcessQueueEvent::class => [
            ProcessQueueListener::class
        ]

    ];
}
