<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['uses' => 'SiteController@index']);
    Route::get('o-meni', ['uses' => 'SiteController@about']);
    Route::get('kontakt',['uses' => 'SiteController@contact']);
    Route::get('nova-objava', ['uses' => 'PostController@writeNewPost', 'as' => 'new_post']);
    Route::post('nova-objava', ['uses' => 'PostController@saveNewPost']);
    Route::get('objava/{id}', ['uses' => 'PostController@postDetails', 'as' => 'details']);
    Route::get('zbirnik-objav', ['uses' => 'PostController@allPosts', 'as' => 'dashboard']);
    Route::post('objava/{id}/komentiraj', ['uses' => 'PostController@saveComment', 'as' => 'save_comment']);
});
