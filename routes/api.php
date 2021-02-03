<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Show All Post
Route::get('blog-post', 'api_blogcontroller@get_all_post');

Route::middleware((['api']))->group(function ($router) {
    // Insert New Post
    Route::post('insert_post', 'api_blogcontroller@insert_data_post');
    Route::post('post/delete/{id}', 'api_blogcontroller@delete_data_post');
    Route::post('post/update/{id}', 'api_blogcontroller@update_data_post');
});
