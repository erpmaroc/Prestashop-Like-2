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

namespace depexorPackages\Order\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use depexorPackages\Cart\Models\Cart;
use depexorPackages\Customer\Models\Customer;
use depexorPackages\Order\Models\ModelFilters\OrderFilter;
use depexorPackages\User\Models\User;

class Order extends Model
{
    use Notifiable;
    use Filterable;

    public $table = 'cart_orders';
    public $fillable = [
        'id',
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

    public function modelFilter()
    {
        return $this->provideFilter(OrderFilter::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

}
