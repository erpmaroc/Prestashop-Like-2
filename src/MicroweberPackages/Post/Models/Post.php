<?php
namespace depexorPackages\Post\Models;

use depexorPackages\Blog\FrontendFilter\BlogFilter;
use depexorPackages\Content\Content;
use depexorPackages\Content\Scopes\PostScope;

class Post extends Content
{
    protected $table = 'content';
    protected $primaryKey = 'id';

    protected $fillable = [
        "subtype",
        "subtype_value",
        "content_type",
        "parent",
        "layout_file",
        "active_site_template",
        "title",
        "url",
        "content_meta_title",
        "content",
        "description",
        "content_body",
        "content_meta_keywords",
        "original_link",
        "require_login",
        "created_by",
        "is_home",
        "is_shop",
        "is_active",
        "updated_at",
        "created_at",
    ];

    public $translatable = ['title','url','description','content','content_body'];

    public $sortable = [
        'id'=>[
            'title'=> 'Post'
        ]
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['content_type'] = 'post';
        $this->attributes['subtype'] = 'post';
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PostScope());
    }

    public function getDescriptionAttribute()
    {
        return $this->content;
    }

    public function shortDescription($limit = 224)
    {
        if (empty($this->content)) {
            return false;
        }

        $shortDescription = $this->content;
        $shortDescription = strip_tags($shortDescription);
        $shortDescription = trim($shortDescription);
        $shortDescription = str_limit($shortDescription, $limit);

        return $shortDescription;
    }

    public function scopeFrontendFilter($query, $params)
    {
        $filter = new BlogFilter();
        $filter->setModel($this);
        $filter->setQuery($query);
        $filter->setParams($params);

        return $filter->apply();
    }
}
