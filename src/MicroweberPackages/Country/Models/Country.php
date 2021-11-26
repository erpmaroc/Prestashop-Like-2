<?php
namespace depexorPackages\Country\Models;

use Illuminate\Database\Eloquent\Model;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

class Country extends Model
{
    use CacheableQueryBuilderTrait;


    public $timestamps = false;
    protected $fillable = ['code','name','phonecode'];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
