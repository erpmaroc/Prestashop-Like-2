<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\Cart\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class CartFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByTitleTrait;
    use FilterByUrlTrait;
    use FilterByKeywordTrait;
}