<?php

$config = array();
$config['name'] = "Pickup from address";
$config['author'] = "depexor";
$config['ui'] = false;
$config['ui_admin'] = false;
$config['categories'] = "online shop";
$config['position'] = 900;
$config['type'] = "shipping_gateway";
$config['version'] = "0.3";
$config['settings']['checkout_position'] = 0;
$config['settings']['icon_class'] = "mdi mdi-walk";
$config['settings']['help_text'] = "get your order from address below";

$config['settings']['service_provider'] = [
    \depexorPackages\Shop\Shipping\Gateways\Pickup\PickupEventServiceProvider::class,
    \depexorPackages\Shop\Shipping\Gateways\Pickup\PickupServiceProvider::class,
];
