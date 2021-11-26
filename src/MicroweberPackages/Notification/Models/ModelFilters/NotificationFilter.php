<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\Notification\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use depexorPackages\Notification\Models\ModelFilters\Traits\NotificationTypeTrait;

class NotificationFilter extends ModelFilter
{
    use NotificationTypeTrait;

}