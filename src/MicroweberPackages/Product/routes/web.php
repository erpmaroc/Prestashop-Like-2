<?php

Route::name('api.product')->prefix('api/product')
    ->namespace('\depexorPackages\Product\Http\Controllers')
    ->group(function () {
        Route::get('quick-view', 'ProductQuickViewController@view')->name('quick-view');
    });

