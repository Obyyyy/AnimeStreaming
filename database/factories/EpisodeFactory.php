<?php

namespace Database\Factories;

use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'anime_id' => Anime::factory(),
            'episode_name' => 1,
            'video' => fake()->randomElement(['1.mp4', '2.mp4', 'Zomrap.mp4', 'zeta.mp4']),
            'thumbnail' => fake()->randomElement(['thumbnail-1.jpg', 'thumbnail-2.jpg', 'thumbnail-3.jpg']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Episode $episode) {
            // Get the latest episode for the same anime
            $latestEpisode = Episode::where('anime_id', $episode->anime_id)
                                    ->where('id', '!=', $episode->id)
                                    ->latest('id')
                                    ->first();

            // Set episode_name based on the latest episode
            if ($latestEpisode) {
                $episode->episode_name = $latestEpisode->episode_name + 1;
            } else {
                $episode->episode_name = 1;
            }

            // Save the episode with the correct episode_name
            $episode->save();
        });
    }
}