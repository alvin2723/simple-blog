<?php


use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/', 'BlogPostController@index')->name('home');
Route::get('/post/search', 'BlogPostController@search')->name('search');
Route::get('/post/category/{id}', 'BlogPostController@search_category')->name('search_category');
Route::get('/detail-post/{id}', 'BlogPostController@view')->name('detail-post');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/form-create-post', 'BlogPostController@view_form_create')->name('view_form_create');
    Route::post('/create-post', 'BlogPostController@store')->name('store');
    Route::get('/form-update-post/{id}', 'BlogPostController@view_form_update')->name('view_form_update');
});
