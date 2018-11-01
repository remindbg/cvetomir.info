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
Route::get('/articles/{category}/{slug}','ArticleController@single');
//Route::get('/articles/{id}/{slug}','ArticleController@show')->name('frontsinglearticle');
Route::get('/category/{id}/{slug}','CategoryController@single');
/**
 * Back End Routes
 * note: All Admin Controllers are using Resource for routes, expect the homepage
 *
 */



Route::post('/admin/articles/uploadimage','Admin\ArticleController@uploadImage')->middleware('auth');
Route::get('/admin', function () {
    return view('layouts.adminlayout');
})->middleware('auth');
Route::resource('/admin/categories', 'Admin\CategoryController')->middleware('auth');
Route::resource('/admin/articles', 'Admin\ArticleController')->middleware('auth');

