<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function addGenre (Request $request) {
        $genres = new Genre();

        $genres->movies_id      =   $request->movies_id;
        $genres->description    =   $request->description;

        $genres->save();

        return response(['Successfully added genre '.$genres->description]);
    }
}
