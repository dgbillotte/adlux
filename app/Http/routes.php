<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('album');
});


Route::group(['middleware' => 'web'], function () {
    // I *think* this sets up the routes for login & logout
    Route::auth();

    // album pages
    Route::get('album', 'AlbumController@showAllAlbums');
    Route::get('album/{id}', 'AlbumController@showAlbum');

    // photo pages
    Route::get('photo/{id}', 'PhotoController@showPhoto');
    Route::get('image-store/{image_spec}', 'ImageGenController@genImage');
});


/*
 * These routes require authentication and https
 */
Route::group(['middleware' => 'secureauth_web'], function () {
    // album mutators
    Route::get('album/create', 'AlbumController@newAlbum');
    Route::post('album/create', 'AlbumController@createAlbum');
    Route::get('album/{id}/edit', 'AlbumController@editAlbum');
    Route::post('album/{id}/edit', 'AlbumController@updateAlbum');

    // photo mutators
    Route::get('album/{id}/add_photo', 'AlbumController@addPhotoForm');
    Route::post('album/{id}/add_photo', 'AlbumController@addPhoto');
    Route::get('photo/{id}/edit', 'PhotoController@editPhoto');
    Route::post('phoot/{id}/edit', 'PhotoController@updatePhoto');

    // configuration
    Route::get('config/all', 'ConfigController@allValues');
    Route::get('config/get/{name}', 'ConfigController@getValue');
    Route::post('config/update/{name}/{value}', 'ConfigController@updateValue');


});
