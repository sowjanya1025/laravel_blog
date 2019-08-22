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

Route::get('/', 'AdminPostsController@posts');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route::get('/admin',function(){
    return view('admin.index');
}); */

Route::get('/admin','AdminUsersController@index');
Route::resource('admin/users','AdminUsersController');
Route::resource('admin/categories','AdminCategoriesController');
Route::resource('admin/posts','AdminPostsController');

Route::get('welcome','AdminPostsController@posts');
Route::get('posts/{id}','AdminPostsController@postsById')->name('posts.id');
Route::resource('admin/comments','AdminCommentsController');
Route::post('admin/comments/approve/{id}','AdminCommentsController@ApproveComments');
