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
    ];

    public function movies(){
        return $this->hasMany(Movies::class);
    }
}
