<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\Category\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use depexorPackages\Category\Models\ModelFilters\Traits\FilterByAvailableProductsByCategoryTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class CategoryFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByAvailableProductsByCategoryTrait;
    use FilterByTitleTrait;
    use FilterByUrlTrait;
    use FilterByKeywordTrait;

}
