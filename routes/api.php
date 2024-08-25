<?php 

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function () {
    Route::get('/books', [BookController::class, 'index']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    }); });

    
Route::group(['middleware' => 'auth:api'], function() {

});

Route::post('/oauth/token', [Laravel\Passport\Http\Controllers\AccessTokenController::class, 'issueToken']);
