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
Route::get('books', 'App\Http\Controllers\Api\BookController@getAllBooks');
Route::get('books/{id}', 'App\Http\Controllers\Api\BookController@getBook');
Route::post('books', 'App\Http\Controllers\Api\BookController@createBook');
Route::put('books/{id}', 'App\Http\Controllers\Api\BookController@updateBook');
Route::delete('books/{id}','App\Http\Controllers\Api\BookController@deleteBook');

Route::get('book_type', 'App\Http\Controllers\Api\BookTypeController@getAllBookType');
Route::get('book_type/{id}', 'App\Http\Controllers\Api\BookTypeController@getBookType');
Route::post('book_type', 'App\Http\Controllers\Api\BookTypeController@createBookType');
Route::put('book_type/{id}', 'App\Http\Controllers\Api\BookTypeController@updateBookType');
Route::delete('book_type/{id}','App\Http\Controllers\Api\BookTypeController@deleteBookType');
