<?php

use App\Http\Controllers\BookController;
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

Route::controller(BookController::class)->group(function () {
    Route::get('books', 'index');

    Route::get('books/{id}', 'show');
    Route::get('books/search/{search_criteria}/{parameter}', 'search');
    Route::get('books/{id}/image', 'image');

    Route::post('books', 'store');
    Route::put('books/{id}', 'update');
    Route::delete('/books/{id}', 'destroy');
});
