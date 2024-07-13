<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $animes = Anime::all();

        foreach ($users as $user)
        {
            $user->followedAnimes()->attach(
                $animes->random(5)->pluck('id')->toArray()
            );
        }
    }
}