<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'getBooksByName']);
    Route::post('/books', [BookController::class, 'storeBook']);
});

Route::middleware(['token.validation'])->group(function () {
    Route::resource('authors', AuthorController::class);
});

