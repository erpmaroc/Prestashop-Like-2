<?php




\Route::name('shop.shipping.')
    ->prefix('api/shop/shipping')
    ->middleware(['xss'])
    ->namespace('\depexorPackages\Shipping\Http\Controllers')
    ->group(function () {
        \Route::match(array('GET', 'POST'),'set_provider', '\depexorPackages\Shipping\Http\Controllers\Api@setShippingProviderToSession')->name('set_provider');
       // Route::post('/language/export', 'LanguageController@export')->name('language.export');
      //  Route::post('/language/upload', 'LanguageController@upload')->name('language.upload');
    });




