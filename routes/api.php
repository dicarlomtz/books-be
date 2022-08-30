<?php

use App\Http\Controllers\BookController;
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
    Route::get('/books', 'index')->name('books');

    Route::get('/books/{id}', 'show')->name('books.show');
    Route::get('/books/search/{search_criteria}/{parameter}', 'search')->name('books.search');
    Route::get('/books/{id}/image', 'image')->name('books.image');

    Route::post('/books', 'store')->name('books.store');
    Route::put('/books/{id}', 'update')->name('books.update');
    Route::delete('/books/{id}', 'destroy')->name('books.destroy');
});
