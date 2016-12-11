<?php

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
    Route::get('register', 'AuthController@getRegisterPage')->name('register');
    Route::get('login', 'AuthController@getLoginPage')->name('login');
    Route::post('register', 'AuthController@postRegistration')->name('user.register');
    Route::post('login', 'AuthController@postLogin')->name('user.login');
    Route::get('logout', 'AuthController@getLogout')->name('user.logout');
});
// blog  functions for registered users
Route::group(['middleware' =>['web', "roles"], "roles" => ['Admin', 'Moderator', 'User']], function (){
    Route::get('posts/create', ['uses' => 'PostController@create', 'as' => 'posts.create']);
    Route::post('posts', ['uses' => 'PostController@store', 'as' => 'posts.store']);
    Route::get('posts/{id}', ['uses' => 'PostController@show', 'as' => 'posts.show']);
    Route::post('create-category', ['uses' => 'PostController@saveCategory', 'as' => 'crete_category']);
    Route::post('posts/{id}/comment', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('posts/{id}/edit', ['uses' => 'PostController@edit', 'as' => 'posts.edit']);
    Route::post('posts/{id}', ['uses' => 'PostController@update', 'as' => 'posts.update']);
    Route::get('users/{id}', ['uses' => 'UsersController@userProfile', 'as' => 'user.profile']);
});
// admin protected section
Route::group(['middleware' => ['web', 'roles'], 'roles' => ['Admin'], 'prefix'=> 'admin'], function (){
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin-dashboard');
    Route::get('users', 'UsersController@index')->name('admin-users');
    Route::post('assign-roles', 'UsersController@assignUserRoles')->name('assign.roles');
    Route::get('blog', 'DashboardController@blogAdmin')->name('admin-blog');
});



