<?php

use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PerformerController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_movie', [MoviesController::class, 'addMovie']);
Route::post('add_performer', [PerformerController::class, 'addPerformer']);
Route::post('add_genre', [GenreController::class, 'addGenre']);
Route::post('give_rating', [MoviesController::class, 'giveRating']);
Route::get('genre', [MoviesController::class, 'genre']);


