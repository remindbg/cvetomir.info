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


Route::get('/','HomeController@index');
Auth::routes();
Route::get('/contact/', function () {
    return view('pages.contact');
});
Route::get('/projects/', function () {
    return view('pages.projects');
});

/**
 * Front End Routes
 * note: 'category' / 'title' are actually category->slug and article->slug
 */

Route::get('/articles','ArticleController@index');
Route::get('/articles/{category}/{slug}','ArticleController@single')->name('singleArticle');
//Route::get('/articles/{id}/{slug}','ArticleController@show')->name('frontsinglearticle');
Route::get('/category/{id}/{slug}','CategoryController@single');
/**
 * Back End Routes
 * note: All Admin Controllers are using Resource for routes, expect the homepage
 *
 */
Route::post('/{article_id}/comment', 'CommentController@store')->name('comment.store');



Route::post('/admin/articles/uploadimage','Admin\ArticleController@uploadImage')->middleware('auth');
Route::get('/admin','Admin\ArticleController@index')->middleware('auth');
Route::resource('/admin/categories', 'Admin\CategoryController')->middleware('auth');
Route::resource('/admin/articles', 'Admin\ArticleController')->middleware('auth');

Route::get('/admin/articles/{id}/category','Admin\CategoryController@attachCategory')->middleware('auth');
Route::post('/admin/articles/{id}/category','Admin\CategoryController@attachCategoryPost')->name('addcategory')->middleware('auth');

//comments
Route::get('/admin/comments/','Admin\CommentController@index')->name('allcomments')->middleware('auth');
Route::post('/admin/comments/{id}/destroy','Admin\CommentController@destroy')->middleware('auth')->name('deletecomment');
Route::get('/admin/comments/{id}/edit','Admin\CommentController@edit')->middleware('auth')->name('editcomment');
Route::post('/admin/comments/{id}/update', 'Admin\CommentController@update')->name('updatecomment')->middleware('auth');

