<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AnimeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AnimeSeeder::class,
            GenreSeeder::class,
        ]);

        $this->call([
            CommentSeeder::class,
            FollowSeeder::class,
            ViewsSeeder::class,
            EpisodeSeeder::class,
            AnimeGenreSeeder::class,
        ]);
    }
}