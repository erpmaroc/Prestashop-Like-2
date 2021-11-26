<?php
namespace depexorPackages\Multilanguage\Models;

use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

class MultilanguageTranslations extends Model
{
    use CacheableQueryBuilderTrait;

    protected $fillable = [
        'rel_id',
        'rel_type',
        'field_name',
        'field_value',
        'locale'
    ];

    public $timestamps = false;

}
