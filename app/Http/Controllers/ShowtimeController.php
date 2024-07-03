<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function addShowTime (Request $request) {
        $showtimes = new Showtime();

        $showtimes->cinemas_id      =   $request->cinemas_id;
        $showtimes->movies_id       =   $request->movies_id;
        $showtimes->show_date       =   $request->show_date;
        $showtimes->start_time      =   $request->start_time;
        $showtimes->end_time        =   $request->end_time;
        $showtimes->theater_room_no =   $request->theater_room_no;

        $showtimes->save();

        return response(['message'=>'Successfully added showtime for Movies_ID '.$showtimes->movies_id, 'success'=>true]);
    }
}
