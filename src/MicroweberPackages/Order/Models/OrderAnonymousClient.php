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

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderAnonymousClient extends Model
{

    use Notifiable;

    public $table = 'cart_orders';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => ''
    ];

}
