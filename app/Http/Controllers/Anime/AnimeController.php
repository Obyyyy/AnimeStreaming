<?php

namespace App\Http\Controllers\Anime;

use App\Models\Anime;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnimeRequest;
use App\Http\Requests\UpdateAnimeRequest;

class AnimeController extends Controller
{
    public function detailAnime(Anime $anime)
    {
        $similiarAnime = Anime::select()->where('genres', $anime->genres)->take(4)->get();
        $comments = $anime->comments;
        return view('pages.anime-detail', compact('anime', 'similiarAnime', 'comments'));
    }
}
