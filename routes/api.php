<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logoutUser']);

    Route::controller(BookController::class)->group(function () {
        Route::get('/books', 'index')->name('books');

        Route::get('/books/{id}', 'show')->name('books.show');
        Route::get('/books/search/parameter', 'search')->name('books.search');
        Route::get('/books/{id}/image', 'image')->name('books.image');

        Route::post('/books', 'store')->name('books.store');
        Route::put('/books/{id}', 'update')->name('books.update');
        Route::delete('/books/{id}', 'destroy')->name('books.destroy');
    });
});



Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/register', 'registerUser')->name('users.register');
    Route::post('/auth/login', 'loginUser')->name('users.login');
});
