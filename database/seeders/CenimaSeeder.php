<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CenimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cinemas')->insert(
            [
                [
                    'cinema_name' => 'Cenima 1',
                ],
                [
                    'cinema_name' => 'Cenima 2',
                ],
                [
                    'cinema_name' => 'Cenima 3',
                ],
                [
                    'cinema_name' => 'Cenima 4',
                ]
            ]
        );
    }
}
