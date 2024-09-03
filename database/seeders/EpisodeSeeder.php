<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Episode::factory(75)->recycle(Anime::all())->create();

        $animes = Anime::all();


        foreach($animes as $anime)
        {
            $currentEpisode = Episode::where('anime_id', $anime->id)->max('episode_name') ?: 0;

            for ($i = 1; $i <= rand(4, 6); $i++) {
                Episode::factory()->create([
                    'anime_id' => $anime->id,
                    'episode_name' => ++$currentEpisode,
                ]);
            }
        }
    }
}