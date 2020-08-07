<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Currencies
    Route::post('currencies/media', 'CurrencyApiController@storeMedia')->name('currencies.storeMedia');
    Route::apiResource('currencies', 'CurrencyApiController');

    // Brokers
    Route::post('brokers/media', 'BrokerApiController@storeMedia')->name('brokers.storeMedia');
    Route::apiResource('brokers', 'BrokerApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');
});
