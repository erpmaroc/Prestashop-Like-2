<?php


autoload_add_namespace(__DIR__.'/src/', 'depexorPackages\\Shop\\Shipping\\Gateways\\Country\\');



//app()->resolving(\depexorPackages\Shipping\ShippingManager::class, function (\depexorPackages\Shipping\ShippingManager $shippingManager, $app) {
//
//    $shippingManager->extend('country',function (){
//        return  new \shop\shipping\gateways\country\ShippingToCountryProvider();
//    });
//
//});