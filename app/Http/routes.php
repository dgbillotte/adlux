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
    return view('welcome');
});

Route::get('album', 'AlbumController@showAllAlbums');
Route::get('album/{id}', 'AlbumController@showAlbum');


// Route::get('album', 'AlbumController@showAllAlbums');
// Route::get('album', 'AlbumController@showAllAlbums');
// Route::get('album', 'AlbumController@showAllAlbums');


Route::get('photo/{id}', 'PhotoController@showImage');

Route::get('image-store/{image_spec}', 'ImageGenController@genImage');


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
