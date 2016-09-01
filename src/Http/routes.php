<?php


Route::get('laravel-wang-editor/example', function () {
    return view('wang-editor::example');
});
Route::post('laravel-wang-editor/upload', 'Douyasi\WangEditor\Http\Controllers\WangEditorController@postUploadPicture');
