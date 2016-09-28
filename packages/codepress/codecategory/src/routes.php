<?php


Route::group(['prefix' => 'admin/categories', 'as' => 'admin.categories.', 'namespace' => 'CodePress\CodeCategory\Controllers', 'middleware' => 'web'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
    Route::get('create', ['as' => 'create', 'uses' => 'AdminCategoriesController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'AdminCategoriesController@store']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminCategoriesController@edit']);
    Route::post('update', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
    Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminCategoriesController@destroy']);
});