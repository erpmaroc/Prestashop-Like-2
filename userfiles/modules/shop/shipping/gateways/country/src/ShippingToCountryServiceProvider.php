<?php


namespace depexorPackages\Shop\Shipping\Gateways\Country;

use Illuminate\Support\ServiceProvider;


class ShippingToCountryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app()->resolving(\depexorPackages\Shipping\ShippingManager::class, function (\depexorPackages\Shipping\ShippingManager $shippingManager) {
            $shippingManager->extend('shop/shipping/gateways/country', function () {
                return new ShippingToCountry();
            });
        });
    }
}
