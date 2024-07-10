<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anime;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(150)->recycle([
            Anime::all(),
            User::all(),
        ])->create();
    }
}