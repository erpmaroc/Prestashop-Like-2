<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::name('api.')
    ->prefix('api')
    ->middleware(['api','admin'])
    ->namespace('\depexorPackages\Page\Http\Controllers\Api')
    ->group(function () {

        Route::apiResource('page', 'PageApiController');

    });
