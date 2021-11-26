<?php
namespace depexorPackages\Content;

class ContentData extends DataFields
{
    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->whereRelType('content');
    }
}
