<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


// routes/web.php
Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);
