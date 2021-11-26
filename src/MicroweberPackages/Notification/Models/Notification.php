<?php
namespace depexorPackages\Notification\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;
use depexorPackages\Notification\Models\ModelFilters\NotificationFilter;

class Notification extends Model
{

    use CacheableQueryBuilderTrait;
    use Filterable;

    protected $casts = [
        'data' => 'json',
        'id' => 'string'
    ];

    public $cacheTagsToClear = ['repositories']; 

    public function modelFilter()
    {
        return $this->provideFilter(NotificationFilter::class);
    }
}
