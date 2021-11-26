<?php

Route::name('admin.blog.filter.')
    ->prefix(ADMIN_PREFIX . '/blog/filter')
    ->middleware(['admin'])
    ->namespace('\depexorPackages\Blog\Http\Controllers')
    ->group(function () {

        Route::any('get-custom-fields-table', 'LiveEditAdminController@getCustomFieldsTableFromPage')->name('get-custom-fields-table');

    });
