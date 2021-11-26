<?php

namespace depexorPackages\Content;


use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;
use depexorPackages\Database\Traits\MaxPositionTrait;


class ContentRelated extends Model
{
    use MaxPositionTrait;

    use CacheableQueryBuilderTrait;

    public $cacheTagsToClear = ['content', 'categories'];

    protected $table = 'content_related';

    protected $fillable = [
        'content_id',
        'related_content_id',
        'position'
    ];

}
