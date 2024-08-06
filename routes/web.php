<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);


// routes/web.php

Route::get('/books', 'BookController@index');
Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');
Route::get('/books/{id}', 'BookController@show');
Route::get('/books/{id}/edit', 'BookController@edit');
Route::put('/books/{id}', 'BookController@update');
Route::delete('/books/{id}', 'BookController@destroy');
