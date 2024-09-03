<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ViewsSeeder extends Seeder
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
            $animesToAttach = $animes->random(5)->pluck('id')->toArray();
            $timestamp = now();
            $pivotData = [];

            foreach($animesToAttach as $animeId)
            {
                $pivotData[$animeId] = [
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }

            $user->viewedAnimes()->attach($pivotData);
        }
    }
}