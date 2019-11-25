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
Route::resource('images', 'ImageController')->except([
    'show'
]);
Route::resource('coordinates', 'CoordinatesController');
Route::get('/', 'ImageController@index')->name('image.index');
Route::resource('groups_images', 'GroupsImagesController');
Route::get('/view/{groupImage}/{imageName}', 'ImageController@show')->name('image.show');
// Route::get('/panorama', function () {
//     return view('layout/panorama-view');
// });
// Route::get('/panorama', 'ImageController@index')->name('image.index');
// Route::get('/images', 'ImageController@index')->name('image.index');
// Route::get('/images/create', 'ImageController@create')->name('image.create');
// Route::post('/images/create', 'ImageController@store')->name('image.store');
// Route::get('/coordinates', 'CoordinatesController@index')->name('coordinate.index');
// Route::get('/coordinates/create', 'CoordinatesController@create')->name('coordinate.create');
// Route::post('/coordinates/create', 'CoordinatesController@store')->name('coordinate.store');
// Route::delete('/images/{id}/delete', 'ImageController@destroy')->name('image.destroy');