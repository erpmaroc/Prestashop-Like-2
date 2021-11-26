<?php

Route::name('api.')
    ->prefix('api')
    ->middleware(['api','admin'])
    ->namespace('\depexorPackages\Product\Http\Controllers\Api')
    ->group(function () {
        Route::apiResource('product', 'ProductApiController');
        Route::apiResource('product_variant', 'ProductVariantApiController');
    });
