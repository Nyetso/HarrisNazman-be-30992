<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'movies_id',
        'description',
    ];

    public function movies(){
        return $this->belongsToMany(Movies::class);
    }
}
