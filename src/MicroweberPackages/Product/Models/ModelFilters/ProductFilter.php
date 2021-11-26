<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\Product\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByContentData;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByPriceTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByQtyTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class ProductFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByTitleTrait;
    use FilterByQtyTrait;
    use FilterByUrlTrait;
    use FilterByPriceTrait;
    use FilterByKeywordTrait;
    use FilterByContentData;

}