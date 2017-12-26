<?php

Route::group(['prefix' => 'laravel-wang-editor', 'middleware' => ['web']], function () {

    Route::get('example', 'Douyasi\WangEditor\Http\Controllers\WangEditorController@getExample');
    Route::post('upload', 'Douyasi\WangEditor\Http\Controllers\WangEditorController@postUploadPicture');

});
