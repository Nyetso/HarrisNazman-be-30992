<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'release_date',
        'duration_length',
        'views',
        'description',
        'poster',
        'mpaa_rating',
        'genre',
        'director',
        'performer',
        'language',
        'cinema_id',
    ];

    public function cinema(){
        return $this->hasOne(Cinema::class);
    }

    public function genre(){
        return $this->belongsToMany(Genre::class)->using(MovieGenre::class);
    }

    public function performer(){
        return $this->hasMany(Performer::class);
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }
}
