<?php
/*
 * This file is part of the depexor framework.
 *
 * (c) depexor CMS LTD
 *
 * For full license information see
 * https://github.com/depexor/depexor/blob/master/LICENSE
 *
 */

namespace depexorPackages\Cart\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use depexorPackages\Cart\Models\ModelFilters\CartFilter;
use depexorPackages\Product\Models\Product;

class Cart extends Model
{
    public $table = 'cart';

    public $fillable = [
        'email',
        'first_name',
        'last_name',
        'country',
        'amount',
        'payment_amount',
        'transaction_id',
        'city',
        'state',
        'zip',
        'address',
        'phone',
        'user_ip',
        'payment_gw'
    ];

    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(CartFilter::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'rel_id');
    }
}
