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
    return view('home');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/**
 * Front End Routes
 * note: 'category' / 'title' are actually category->slug and article->slug
 */

Route::get('/articles','ArticleController@index');
Route::get('/articles/{category}','CategoryController@single');
Route::get('/articles/{category}/{slug}','ArticleController@single');
Route::post('/articles/{id}','CommentController@store');

/**
 * Back End Routes
 * note: All Admin Controllers are using Resource for routes, expect the homepage
 *
 */


Route::post('/admin/articles/uploadimage','Admin\ArticleController@uploadImage');
Route::get('/admin', function () {
    return view('layouts.adminlayout');
}); //->middleware('auth');
Route::resource('/admin/articles', 'Admin\ArticleController');
Route::resource('/admin/categories', 'Admin\CategoryController');

