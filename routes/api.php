<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\PerformerController;
use App\Http\Controllers\MovieGenreController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_movie', [MoviesController::class, 'addMovie']);
Route::post('add_performer', [PerformerController::class, 'addPerformer']);
Route::post('add_genre', [GenreController::class, 'addGenre']);
Route::post('add_cinema', [CinemaController::class, 'addCinema']);
Route::post('add_showtime', [ShowtimeController::class, 'addShowTime']);
Route::post('add_movie_genre', [MovieGenreController::class, 'addMovieGenre']);
Route::post('give_rating', [RatingController::class, 'giveRating']);

Route::put('genre', [MoviesController::class, 'genre']);
Route::get('new_movies', [MoviesController::class, 'newMovies']);
Route::put('search_performer', [MoviesController::class, 'searchPerformer']);
Route::put('timeslot', [MoviesController::class, 'timeslot']);
Route::put('movie_theater', [MoviesController::class, 'movieTheater']);


