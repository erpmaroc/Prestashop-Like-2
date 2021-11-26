<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/


Route::prefix(ADMIN_PREFIX)->name('admin.')
    ->namespace('\depexorPackages\Customer\Http\Controllers\Admin')
    ->middleware(['admin','api'])->group(function () {

    Route::post('/customers/delete', [
        'as' => 'customers.delete',
        'uses' => 'CustomersController@delete'
    ]);

    Route::resource('customers', 'CustomersController');

});
