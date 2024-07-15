<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Anime;
use App\Models\Comment;
use App\Models\Episode;
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
        ]);

        $this->call([
            CommentSeeder::class,
            FollowSeeder::class,
            ViewsSeeder::class,
            EpisodeSeeder::class,
        ]);
    }
}