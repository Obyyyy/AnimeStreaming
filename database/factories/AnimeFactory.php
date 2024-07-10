<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => fake()->randomElement(['trend-1.jpg', 'trend-2.jpg', 'trend-3.jpg', 'trend-4.jpg', 'trend-5.jpg', 'trend-6.jpg', 'recent-1.jpg', 'recent-2.jpg', 'recent-3.jpg', 'recent-4.jpg', 'recent-5.jpg', 'recent-6.jpg', 'popular-1.jpg', 'popular-2.jpg', 'popular-3.jpg', 'popular-4.jpg', 'popular-5.jpg', 'popular-6.jpg']),
            'description' => fake()->paragraph(4),
            'type' => fake()->randomElement(['TV Series', 'Movie']),
            'studios' => fake()->randomElement(['MAPPA', 'Ufotable', 'A-1 Pictures']),
            'date_aired' => fake()->dateTimeThisYear(),
            'status' => fake()->randomElement(['Completed', 'Ongoing']),
            'genres' => fake()->randomElement(['Action', 'Adventure', 'Fantasy', 'Magic', 'Romance']),
            'duration' => '24',
            'quality' => fake()->randomElement(['HD', 'Camera', 'Full HD', 'BD']),
        ];
    }
}