<?php

namespace App\Http\Controllers;

use App\Models\MovieGenre;
use Illuminate\Http\Request;

class MovieGenreController extends Controller
{
    public function addMovieGenre (Request $request) {
        $movieGenre = new MovieGenre();

        $movieGenre->movies_id  =   $request->movies_id;
        $movieGenre->genre_id   =   $request->genre_id;

        $movieGenre->save();

        return(['Successfully added']);
    }
}
