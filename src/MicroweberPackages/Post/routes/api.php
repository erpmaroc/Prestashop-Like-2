<?php

Route::name('api.')
    ->prefix('api')
    ->middleware(['api','admin'])
    ->namespace('\depexorPackages\Post\Http\Controllers\Api')
    ->group(function () {
    Route::apiResource('post', 'PostApiController');
});



