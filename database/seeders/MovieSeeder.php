<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('movies')->insert([
                [
                    'title'           => fake()->name(),
                    'release_date'    => '2021-01-01',
                    'duration_length' => '120',
                    'views'           => '100',
                    'description'     => 'Description of Movie' . $i,
                    'poster'          => 'poster.jpg',
                    'mpaa_rating'     => fake()->randomElement(['PG-13', 'PG-18']),
                    'director'        => 'Director ' . $i,
                    'language'        => fake()->randomElement(['English', 'Malay']),
                    'cinemas_id'      => fake()->numberBetween(1, 4)
                ],
            ]);
        }

        foreach (Movies::all() as $movie) {
            $movie->rating()->create([
                'username'      => fake()->name(),
                'rating'        => fake()->numberBetween(1, 10),
                'r_description' => 'Description of Rating'
            ]);
        }
    }
}
