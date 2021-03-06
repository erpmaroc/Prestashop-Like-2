<?php
namespace depexorPackages\Page\Models;

use depexorPackages\Content\Content;
use depexorPackages\Content\Scopes\PageScope;
use depexorPackages\Database\Traits\HasSlugTrait;
use depexorPackages\Media\Traits\MediaTrait;


class Page extends Content
{
    use HasSlugTrait;
    use MediaTrait;

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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
/*
 * This will broke when you carete blog or shop dynamic pages
        $this->attributes['content_type'] = 'page';
        $this->attributes['subtype'] = 'static';*/
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PageScope());
    }
}
