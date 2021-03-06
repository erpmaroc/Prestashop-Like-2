<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace depexorPackages\Order\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use depexorPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class OrderFilter extends ModelFilter
{
    use OrderByTrait;

    public function keyword($keyword) {

        $keyword = trim($keyword);
        if (empty($keyword)) {
            return;
        }

        $model = $this->getModel();
        $searchInFields = $model->getFillable();

        return $this->query->where(function ($query) use ($model, $searchInFields, $keyword) {

            $query->whereHas('cart', function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%');
            });

            $searchInFields = $model->getFillable();
            foreach ($searchInFields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $keyword . '%');
            }
        });
    }


}