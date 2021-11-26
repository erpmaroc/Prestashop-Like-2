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

namespace depexorPackages\Notification\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use depexorPackages\Notification\Listeners\UserRegisteredListener;
use depexorPackages\User\Events\UserWasRegistered;

class NotificationEventServiceProvider extends EventServiceProvider
{
    

}

