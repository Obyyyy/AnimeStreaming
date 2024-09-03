<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnimeGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = Genre::all();
        $animes = Anime::all();

        foreach($animes as $anime)
        {
            $genresToAttach = $genre->random(3)->pluck('id')->toArray();
            $timestamp = now();
            $pivotData = [];

            foreach($genresToAttach as $genreId)
            {
                $pivotData[$genreId] = [
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }

            $anime->genres()->attach($pivotData);
        }
    }
}
