<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $table = 'showtimes';

    protected $fillable = [
        'cinemas_id',
        'movies_id',
        'show_date',
        'start_time',
        'end_time',
    ];
}
