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

// Route::get('album/create', 'AlbumController@newAlbum');


// Route::get('album', 'AlbumController@showAllAlbums');
// Route::get('album', 'AlbumController@showAllAlbums');
// Route::get('album', 'AlbumController@showAllAlbums');





Route::group(['middleware' => 'web'], function () {
    // I *think* this sets up the routes for login & logout
    Route::auth();

    // Route::get('/home', 'HomeController@index');
    

    Route::get('album', 'AlbumController@showAllAlbums');
    Route::get('album/{id}', 'AlbumController@showAlbum');

    Route::get('photo/{id}', 'PhotoController@showPhoto');
    Route::get('image-store/{image_spec}', 'ImageGenController@genImage');


    /*
     * These routes require authentication and https
     * TODO: add https requirement
     */
    Route::group(['middleware' => 'auth'], function () {

        Route::get('album/create', 'AlbumController@newAlbum');
        Route::post('album/create', 'AlbumController@createAlbum');
        Route::get('config/all', 'ConfigController@allValues');
        Route::get('config/get/{name}', 'ConfigController@getValue')
        Route::post('config/update/{name}/{value}', 'ConfigController@updateValue');

    });

});
