<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:42 PM
 */

namespace depexorPackages\Content\Models\ModelFilters\Traits;

trait FilterByUrlTrait{

    public function url($url)
{
    return $this->query->where('url', $url);
}

}