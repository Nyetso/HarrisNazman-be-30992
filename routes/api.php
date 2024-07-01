<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_movie', [MoviesController::class, 'addMovie']);
Route::post('give_rating', [MoviesController::class, 'giveRating']);
Route::get('genre', [MoviesController::class, 'genre']);


