<?php


namespace depexorPackages\Shop\Shipping\Gateways\Pickup;

use Illuminate\Support\ServiceProvider;


class PickupServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->resolving(\depexorPackages\Shipping\ShippingManager::class, function (\depexorPackages\Shipping\ShippingManager $shippingManager) {
            $shippingManager->extend('shop/shipping/gateways/pickup', function () {
                return new PickupDriver();
            });
        });
    }
}
