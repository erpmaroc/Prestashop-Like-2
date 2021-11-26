<?php
namespace depexorPackages\Menu;

use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;
use depexorPackages\Multilanguage\Models\Traits\HasMultilanguageTrait;

class Menu extends Model
{
    use CacheableQueryBuilderTrait;
    use HasMultilanguageTrait;

    public $fillable = [
        "id",
        "title",
        "item_type",
        "parent_id",
        "content_id",
        "categories_id",
        "position",
        "is_active",
        "auto_populate",
        "description",
        "url",
        "url_target",
        "size",
        "default_image",
        "rollover_image"
    ];

    public $translatable = ['title'];

    public $cacheTagsToClear = ['menus','repositories','content'];
}
