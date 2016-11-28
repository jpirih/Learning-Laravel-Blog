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

// public routes
Route::group(['middleware' => 'web'], function () {

    Route::get('/','SiteController@index')->name('index');
    Route::get('posts', 'PostController@index')->name('blog');
    Route::get('about', 'SiteController@about')->name('about');
    Route::get('contact', 'SiteController@contact')->name('contact');
    Route::auth();
    Route::get('/home', 'HomeController@index');
}); 
// blog  functions for registered users
Route::group(['middleware' =>['web', "roles"], "roles" => ['Admin', 'Author', 'User']], function (){
    Route::get('posts/create', ['uses' => 'PostController@create', 'as' => 'posts.create']);
    Route::post('posts', ['uses' => 'PostController@store', 'as' => 'posts.store']);
    Route::get('posts/{id}', ['uses' => 'PostController@show', 'as' => 'posts.show']);
    Route::get('zbirnik-objav', ['uses' => 'PostController@allPosts', 'as' => 'dashboard']);
    Route::post('create-category', ['uses' => 'PostController@saveCategory', 'as' => 'crete_category']);
    Route::post('posts/{id}/comment', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('posts/{id}/edit', ['uses' => 'PostController@edit', 'as' => 'posts.edit']);
    Route::post('posts/{id}', ['uses' => 'PostController@update', 'as' => 'posts.update']);
});

Route::group(['middleware' => ['web', 'roles'], 'roles' => ['Admin'], 'prefix'=> 'admin'], function (){
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin-dashboard');
});



