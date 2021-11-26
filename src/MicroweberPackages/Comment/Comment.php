<?php

namespace depexorPackages\Comment;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use depexorPackages\Content\Models\ModelFilters\ContentFilter;
use depexorPackages\Database\Casts\MarkdownCast;

class Comment extends Model
{
    use Filterable;

    public $table = 'comments';

    protected $fillable = [
        'rel_type',
        'rel_id',
        'comment_name',
        'comment_email',
        'comment_website',
        'comment_body',
    ];

//    protected $casts = [
//        'comment_body'=>MarkdownCast::class
//    ];

    public function modelFilter()
    {
        return $this->provideFilter(ContentFilter::class);
    }

}