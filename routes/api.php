<?php

use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function(){
    Route::post('/login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});


Route::resource('galleries',GalleriesController::class);
//Route::post('galleries', 'GalleriesController@store');

Route::post('galleries/{id}/comments', 'CommentsController@store');
Route::delete('/comments/{id}', 'CommentsController@destroy');

Route::get('authors/{id}', "AuthorController@show");
Route::get('authors-galeries/{id}', "AuthorController@show");


// Route::middleware('auth:api')->get('auth-author/{user_id}','AuthAuthorController@show');

// Route::middleware('auth:api')->group(function(){
//     Route::resource('galleries',GalleriesController::class);
// });

// Route::middleware('auth:api')->group(function(){
//     Route::resource('galleries/$id',"GalleriesController@show");
// });
// Route::get('galleries/$id',"GalleriesController@show");