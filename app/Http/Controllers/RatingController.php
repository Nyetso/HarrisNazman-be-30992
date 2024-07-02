<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function giveRating (Request $request) {
        $movies     =   Movies::query()->where('title', 'like', '%'.$request->title.'%')->first();
        $ratings    =   new Rating();

        $ratings->movies_id         =   $movies->id;
        $ratings->username          =   $request->username;
        $ratings->rating            =   $request->rating;
        $ratings->r_description     =   $request->r_description;

        $ratings->save();

        return(['The rating for Movie_ID '.$movies->id.' has been successfully recorded by '.$ratings->username]);
    }
}
