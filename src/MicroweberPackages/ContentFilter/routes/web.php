<?php
 


Route::prefix(ADMIN_PREFIX)->middleware(['admin'])->namespace('\depexorPackages\ContentFilter\Http\Controllers')->group(function () {

    Route::resource('content/filter', 'ContentFilterAdminController');

});

