<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Cinema;
use App\Models\Movies;
use App\Models\Rating;
use App\Models\Showtime;
use App\Models\Performer;
use App\Models\MovieGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function addMovie (Request $request){
        $movies = new Movies();

        $movies->title              =   $request->title;
        $movies->release_date       =   $request->release_date;
        $movies->duration_length    =   $request->duration_length;
        $movies->views              =   $request->views;
        $movies->description        =   $request->description;
        $movies->poster             =   $request->poster;
        $movies->mpaa_rating        =   $request->mpaa_rating;
        $movies->director           =   $request->director;
        $movies->language           =   $request->language;
        $movies->cinemas_id         =   $request->cinemas_id;
        $movies->save();
        $success=true;

        return response(['message'=>'Successfully added movie '.$movies->title.' with Movie_ID '.$movies->id,'success'=>$success]);

    }

    public function newMovies (Request $request) {
        $date = new Carbon($request->release_date);
        $movies = Movies::whereRaw('release_date <= "'.$date.'"')->get();

        return response([$movies]);
    }

    public function searchPerformer (Request $request) {
        $performer = Performer::query()->where('performer', 'like', '%'.$request->performer.'%')->first();
        $movies    = Movies::query()->where('id', $performer->movies_id)->get();

        return response([$movies]);
    }

    public function genre (Request $request) {
        $count = 0;
        $movies[]="";
        $genre              = Genre::query()->where('description', 'like', '%'.$request->genre.'%')->first();
        $moviesGenre        = MovieGenre::query()->where('genre_id', $genre->id)->get();
        foreach($moviesGenre as $movGen){
            $movies[$count] = Movies::query()->where('id', $movGen->movies_id)->get();
            $count++;
        }

        return response([$movies]);
    }

    public function timeslot (Request $request) {
        $cinema = Cinema::query()->where('cinema_name', 'like', '%'.$request->cinema_name.'%')->first();
        $showtimes  = Showtime::query()->where('cinemas_id', $cinema->id)->where('start_time', '>=', $request->start_time)->where('end_time', '<=', $request->end_time)->get();

        return response([$showtimes]);
    }

    public function movieTheater (Request $request) {
        $cinema = Cinema::query()->where('cinema_name', 'like', '%'.$request->cinema_name.'%')->first();
        $showtimes  = Showtime::query()->where('cinemas_id', $cinema->id)->where('show_date', $request->show_date)->get();

        return response([$showtimes]);
    }

    public function highestRating () {

        $count=0;
        $moviesByRating[]="";

        $ratings1 = Rating::orderBy('rating', 'desc')->get();

        foreach($ratings1 as $rating) {
            $moviesByRating[$count] = Movies::query()->where('id', $rating->movies_id)->where('mpaa_rating', 'PG-18')->first();
            if($moviesByRating[$count]){
                $count++;
            }
        }
        $count=0;
        foreach($ratings1 as $rating) {
            $moviesByRating2[$count] = Movies::query()->where('id', $rating->movies_id)->where('mpaa_rating', 'PG-13')->first();
            if($moviesByRating2[$count]!=null){
                $count++;
            }
        }
        // dd($moviesByRating2);

        return response()->json([$moviesByRating, $moviesByRating2]);
    }
}
