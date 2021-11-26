<?php


namespace depexorPackages\Core\Models;


trait HasSearchableTrait
{
    public function getSearchable()
    {
        return $this->searchable;
    }
}
