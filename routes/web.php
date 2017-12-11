<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LoginController@index');

Route::any('/admin','admincontroller@index');

Route::any('/data_visualization', function () {
    return view('data-visualization');
});

Route::any('/tables', function () {
    return view('tables');
});

Route::any('/maps', function () {
    return view('maps');
});
Route::any('/preferences', function () {
    return view('preferences');
});



