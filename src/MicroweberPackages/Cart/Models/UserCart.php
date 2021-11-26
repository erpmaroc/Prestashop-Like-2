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

namespace depexorPackages\Cart\Models;

use depexorPackages\Cart\Scopes\UserCartScope;

class UserCart extends Cart
{
    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new UserCartScope());
    }
}
