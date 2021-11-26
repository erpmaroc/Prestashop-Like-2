<?php
/**
 * depexor Offers Module
 * Developed by: Ezyweb.uk
 *
 * @category   Modules
 * @package    Config
 * @author     Nick Woolley <nick@ezyweb.uk>
 * @copyright  2018 depexor
 */


$config = array();
$config['name'] = "Offers";
$config['author'] = "Nick Woolley";
$config['ui'] = false;
$config['ui_admin'] = true;
$config['categories'] = "online shop";
$config['version'] = 1.0;
$config['position'] = 27;
//WAS $config['settings']['service_provider'] = [
//    \depexorPackages\Shop\Offers\ShopOffersServiceProvider::class,
//    \depexorPackages\Shop\Offers\ShopOffersEventServiceProvider::class,
//];

$config['settings']['service_provider'] = [
    \depexorPackages\Offer\Providers\EventServiceProvider::class,
    \depexorPackages\Offer\Providers\OfferServiceProvider::class,
];

$config['tables'] = array(
	'offers' => array(
		'id' => 'integer',
		'product_id' => 'integer',
		'price_id' => 'integer',
	//	'price_key' => 'string',
		'offer_price' => 'float',
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'expires_at' => 'datetime',
		'created_by' => 'integer',
		'edited_by' => 'integer',
		'is_active' => 'integer',
	)
);