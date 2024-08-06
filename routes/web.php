<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);


// routes/web.php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);
