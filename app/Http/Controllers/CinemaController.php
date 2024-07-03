<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movies;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function addCinema (Request $request) {
        $cinemas = new Cinema();

        $cinemas->cinema_name       =   $request->cinema_name;

        $cinemas->save();

        return response(['message'=>'Successfully added cinema '.$cinemas->cinema_name, 'success'=>true]);
    }

}
