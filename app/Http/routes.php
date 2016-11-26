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
    Route::get('/blog', ['middleware'=> 'auth','uses' => 'PostController@posts', 'as' => 'blog']);
    Route::get('o-meni', ['uses' => 'SiteController@about']);
    Route::get('kontakt',['uses' => 'SiteController@contact']);
    Route::get('nova-objava', ['middleware' => 'auth', 'uses' => 'PostController@writeNewPost', 'as' => 'new_post']);
    Route::post('nova-objava', ['uses' => 'PostController@saveNewPost']);
    Route::get('objava/{id}', ['uses' => 'PostController@postDetails', 'as' => 'details']);
    Route::get('zbirnik-objav', ['uses' => 'PostController@allPosts', 'as' => 'dashboard']);
    Route::post('create-category', ['uses' => 'PostController@saveCategory', 'as' => 'crete_category']);
    Route::post('objava/{id}/comment', ['uses' => 'PostController@saveComment', 'as' => 'save_comment']);
    Route::get('objava/{id}/update', ['uses' => 'PostController@editPost', 'as' => 'edit_post']);
    Route::post('objava/{id}/update', ['uses' => 'PostController@updatePost', 'as' => 'update_post']);
    Route::get('/login', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback');
});
