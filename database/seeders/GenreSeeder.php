<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Genre::factory(10)->create();
        $genres = [
            [
                'name' => 'Action',
                'slug' => 'action',
            ],
            [
                'name' => 'Adventure',
                'slug' => 'adventure',
            ],
            [
                'name' => 'Comedy',
                'slug' => 'comedy',
            ],
            [
                'name' => 'Drama',
                'slug' => 'drama',
            ],
            [
                'name' => 'Fantasy',
                'slug' => 'fantasy',
            ],
            [
                'name' => 'Romance',
                'slug' => 'romance',
            ],
            [
                'name' => 'Supernatural',
                'slug' => 'supernatural',
            ],
        ];

        foreach ($genres as $genre)
        {
            Genre::create($genre);
        }
    }
}