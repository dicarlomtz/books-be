<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books');

    Route::get('/books/{id}', 'show')->name('books.show');
    Route::get('/books/search/parameter', 'search')->name('books.search');
    Route::get('/books/{id}/image', 'image')->name('books.image');

    Route::post('/books', 'store')->name('books.store');
    Route::put('/books/{id}', 'update')->name('books.update');
    Route::delete('/books/{id}', 'destroy')->name('books.destroy');
});
