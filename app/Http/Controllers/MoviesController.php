<?php

namespace App\Http\Controllers;

use App\Models\Movies;
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
        $success = true;

        return response(['Successfully added movie '.$movies->title.' with Movie_ID '.$movies->id,$success]);

    }

    public function giveRating(Request $request){

        $movies = Movies::query()->where('title', 'like', '%'.$request->title.'%')->get();
        // dd($movies);
        // if(count($movies) > 1){
            foreach($movies as $movies){
                $movies->mpaa_rating        =   $request->mpaa_rating;
                $movies->username           =   $request->username;
                $movies->r_description      =   $request->r_description;

                $movies->update();
            }
        // }
        // else{
        //     $movies->mpaa_rating        =   $request->mpaa_rating;
        //     $movies->username           =   $request->username;
        //     $movies->r_description      =   $request->r_description;
        // }

        $success = true;

        return response(['Successfully added review for '.$movies->title.' by user '.$movies->username,$success]);
    }

    public function genre(Request $request){
        // $data[] = new Movies();
        $movies = Movies::query()->where('genre', 'like', '%'.$request->genre.'%')->get();
        // $count=0;
        // $count3=0;
        // $count2=count($movies)-2;

        // $data[$count]->movie_id            =   $movies[$count]->movie_id;
        // $data[$count]->title               =   $movies[$count]->title;
        // $data[$count]->release_date        =   $movies[$count]->release_date;
        // $data[$count]->duration_length     =   $movies[$count]->duration_length;
        // $data[$count]->views               =   $movies[$count]->views;
        // $data[$count]->description         =   $movies[$count]->description;
        // $data[$count]->poster              =   $movies[$count]->poster;
        // $data[$count]->mpaa_rating         =   $movies[$count]->mpaa_rating;
        // $data[$count]->genre               =   $movies[$count]->genre;
        // $data[$count]->director            =   $movies[$count]->director;
        // $data[$count]->performer           =   $movies[$count]->performer;
        // $data[$count]->language            =   $movies[$count]->language;
        // $data[$count]->cinema_id           =   $movies[$count]->cinema_id;

        // foreach($movies as $movie){
        //     if($count < $count2){
        //         if($data[$count]->movie_id != $movie[$count3]->movie_id)
        //         {
        //             $count++;
        //             $data[$count]->movie_id            =   $movies[$count]->movie_id;
        //             $data[$count]->title               =   $movies[$count]->title;
        //             $data[$count]->release_date        =   $movies[$count]->release_date;
        //             $data[$count]->duration_length     =   $movies[$count]->duration_length;
        //             $data[$count]->views               =   $movies[$count]->views;
        //             $data[$count]->description         =   $movies[$count]->description;
        //             $data[$count]->poster              =   $movies[$count]->poster;
        //             $data[$count]->mpaa_rating         =   $movies[$count]->mpaa_rating;
        //             $data[$count]->genre               =   $movies[$count]->genre;
        //             $data[$count]->director            =   $movies[$count]->director;
        //             $data[$count]->performer           =   $movies[$count]->performer;
        //             $data[$count]->language            =   $movies[$count]->language;
        //             $data[$count]->cinema_id           =   $movies[$count]->cinema_id;
        //         }
        //     }
        //     $count3++;
        // }

        // foreach($movies as $movies1){
        //     if($movies1->duration_length > 60)
        //     $movies1->duration_length = '1 Hour and '+(($movies1->duration_length)-60)+' minutes';
        // }

        // foreach($movies as $movie){
        //     return response([
        //         'Movie_ID: '.$movie->movie_id,
        //         'Title: '.$movie->title,
        //         'Genre: '.$movie->genre,
        //         'Duration: '.$movie->duration_length,
        //         'Views: '.$movie->views,
        //         'Poster: '.$movie->poster,
        //         'Overall_rating: '.$movie->mpaa_rating,
        //         'Descroption: '.$movie->description,
        //     ]);
        // }

        return response([$movies]);
    }
}
