<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\User\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class UserFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByUrlTrait;
    use FilterByKeywordTrait;

}