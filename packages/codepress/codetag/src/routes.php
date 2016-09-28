<?php

Route::group(['prefix' => 'admin/tags', 'as' => 'admin.tags.', 'namespace' => 'CodePress\CodeTag\Controllers'], function () {

    Route::get('', ['as' => 'index', 'uses' => 'AdminTagsController@index']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminTagsController@edit']);
    Route::post('update', ['as' => 'update', 'uses' => 'AdminTagsController@update']);
    Route::get('create', ['as' => 'create', 'uses' => 'AdminTagsController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'AdminTagsController@store']);
    Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminTagsController@destroy']);
});