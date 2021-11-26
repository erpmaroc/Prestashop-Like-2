<?php

namespace depexorPackages\Shipping\Providers;


class NoShippingDriver extends AbstractShippingDriver implements ShippingDriverInterface
{

    public function isEnabled()
    {
        return true;
    }

    public function title()
    {
        return 'NoShippingDriver';
    }

    public function cost()
    {
        return 0;
    }

    public function process()
    {
        return [];
    }


}