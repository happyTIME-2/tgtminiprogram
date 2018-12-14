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

Route::get('/', function () {
    return view('welcome');
});


/**
 *
 * Post
 *
 * controller => PostsController
 * Eloquent model => Post
 * migration => create_posts_table
 *
 * GET 获取资源
 * POST 创建资源
 * PUT 更新资源（需提供全部资源信息）
 * PATCH 更新资源（提供部分资源信息）
 * DELETE 删除资源
 *
 * posts
 * GET /posts
 * GET /posts/create
 * POST /posts
 * GET /posts/{id}/edit
 * GET /posts/{id}
 * PATCH /posts/{id}
 * DELETE /posts/{id}
 */

Route::prefix('/posts')->group(function () {
    Route::get('/','PostController@index')->name('index');

    Route::get('create','PostController@create');
    Route::post('/','PostController@store');


    Route::post('register', 'Post\RegistrationController@store');

    Route::get('{post}','PostController@show')->where('post','\d+');
    Route::post('{post}/comments','Post\CommentController@store');

    Route::get('register', 'Post\RegistrationController@create');
    Route::post('register', 'Post\RegistrationController@store');

    Route::get('login', 'Post\SessionsController@create');
    Route::post('login', 'Post\SessionsController@store');
    Route::get('logout', 'Post\SessionsController@destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/zzInfo', 'GameInfoController@loadData');
