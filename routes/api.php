<?php

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Api',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api', 'namespace' => 'Api\V1\Admin'], function () {
    Route::get('bankusers/options', 'BankuserApiController@getOptions');
    Route::get('currency-users/options', 'CurrencyUserApiController@getOptions');
    Route::get('transactions/options', 'TransactionApiController@getOptions');
});
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

    // Banks
    Route::apiResource('banks', 'BankApiController');

    // Bankusers
    Route::apiResource('bankusers', 'BankuserApiController');

    // Currency Users
    Route::apiResource('currency-users', 'CurrencyUserApiController');
});
