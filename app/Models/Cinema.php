<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';

    protected $fillable = [
        'cinema_name',
        'show_date',
        'start_time',
        'end_time',
        'theater_room_no',
    ];

    public function movies(){
        return $this->hasMany(Movies::class);
    }
}
