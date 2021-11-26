<?php
namespace depexorPackages\Option\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \depexorPackages\Option\Models\Option
 */
class Option extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'option';
    }
}