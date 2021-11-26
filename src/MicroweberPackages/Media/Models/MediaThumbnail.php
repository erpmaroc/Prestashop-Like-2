<?php
namespace depexorPackages\Media\Models;

use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Casts\ReplaceSiteUrlCast;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

class MediaThumbnail extends Model
{

    public $cacheTagsToClear = ['media','media_thumbnails'];

    use CacheableQueryBuilderTrait;

    public $table = 'media_thumbnails';

    protected $guarded = ['id'];

    protected $casts = [
        'image_options' => 'json',
        'filename' => ReplaceSiteUrlCast::class, //Casts like that: http://lorempixel.com/400/200/ =>  {SITE_URL}400/200/
    ];
}
