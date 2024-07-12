<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'description' => 'Horror',
                'movies_id'   => 0,
            ],
            [
                'description' => 'Action',
                'movies_id'   => 0,
            ],
            [
                'description' => 'Comedy',
                'movies_id'   => 0,
            ],
            [
                'description' => 'Drama',
                'movies_id'   => 0,
            ],
            [
                'description' => 'Romance',
                'movies_id'   => 0,
            ],
        ]);
    }
}
