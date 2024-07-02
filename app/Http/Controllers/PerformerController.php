<?php

namespace App\Http\Controllers;

use App\Models\Performer;
use Illuminate\Http\Request;

class PerformerController extends Controller
{
    public function addPerformer (Request $request) {
        $performer = new Performer();

        $performer->movies_id       =   $request->movies_id;
        $performer->performer       =   $request->performer;

        $performer->save();
        $success = true;

        return response(['Successfully added performer '.$performer->performer.' for Movie_ID '.$performer->movies_id,$success]);

    }
}
