<?php
namespace depexorPackages\Content;

use Conner\Tagging\Taggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use depexorPackages\Category\Traits\CategoryTrait;
use depexorPackages\Content\Models\ModelFilters\ContentFilter;
use depexorPackages\ContentData\Traits\ContentDataTrait;
use depexorPackages\Core\Models\HasSearchableTrait;
use depexorPackages\CustomField\Traits\CustomFieldsTrait;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;
use depexorPackages\Database\Traits\HasCreatedByFieldsTrait;
use depexorPackages\Database\Traits\HasSlugTrait;
use depexorPackages\Media\Traits\MediaTrait;
use depexorPackages\Menu\Traits\HasMenuItem;
use depexorPackages\Multilanguage\Models\Traits\HasMultilanguageTrait;
use depexorPackages\Product\Models\ModelFilters\ProductFilter;
use depexorPackages\Tag\Traits\TaggableTrait;

class Content extends Model
{
    use HasMultilanguageTrait;
    use TaggableTrait;
    use ContentDataTrait;
    use CustomFieldsTrait;
    use CategoryTrait;
    use HasSlugTrait;
    use HasSearchableTrait;
    use HasMenuItem;
    use MediaTrait;
    use Filterable;
    use HasCreatedByFieldsTrait;
    use CacheableQueryBuilderTrait;

    protected $table = 'content';
    protected $content_type = 'content';
    public $additionalData = [];

    public $cacheTagsToClear = ['repositories', 'content', 'content_fields_drafts', 'menu', 'content_fields', 'categories'];

    public $translatable = ['title','url','description','content','content_body'];

    protected $attributes = [
        'is_active' => '1',
        'is_deleted' => '0',
        'is_shop' => '0',
        'is_home' => '0',
    ];

    protected $searchable = [
        'id',
        'title',
        'content',
        'content_body',
        'content_type',
        'subtype',
        'description',
        'is_home',
        'is_shop',
        'is_deleted',
        'subtype',
        'subtype_value',
        'parent',
        'layout_file',
        'active_site_template',
        'url',
        'content_meta_title',
        'content_meta_keywords',
    ];

    protected $fillable = [
        "id",
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
        "is_deleted",
        "updated_at",
        "created_at",
    ];

    public function related()
    {
        return $this->hasMany(ContentRelated::class)->orderBy('position', 'ASC');
    }

    public function modelFilter()
    {
        return $this->provideFilter(ContentFilter::class);
    }

    public function getMorphClass()
    {
        return 'content';
    }

    public function link()
    {
        return content_link($this->id);
    }
}
