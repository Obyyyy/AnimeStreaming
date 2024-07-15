<?php

namespace App\Http\Controllers\Anime;

use App\Models\Anime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function watchingAnime(Anime $anime, $episode_name)
    {
        $episode = Episode::where('anime_id', $anime->id)->where('episode_name', $episode_name)->first();
        $currentEpisode = $episode->episode_name;

        return view('pages/anime-watching', compact('anime', 'episode', 'currentEpisode'));
    }
}