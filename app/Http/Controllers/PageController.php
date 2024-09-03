<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $animes = Anime::withCount('viewers')->orderBy('viewers_count', 'desc')->take(3)->get();
        $trendingAnimes = Anime::select()->orderBy('title', 'desc')->take(6)->get();

        $liveAnimes = Genre::select()->where('name', 'Action')->first()->animes->take(6);
        $forYouAnimes = Genre::select()->where('name', 'Adventure')->first()->animes->take(4);
        $recentlyAnimes = Anime::select()->latest()->take(6)->get();

        return view('pages.home', compact('animes', 'trendingAnimes', 'liveAnimes','recentlyAnimes', 'forYouAnimes'));
    }

    public function showAnimeByGenres(Genre $genre)
    {
        $animes = $genre->animes;
        $forYouAnimes = Anime::withCount('viewers')->orderBy('viewers_count', 'desc')->take(4)->get();

        return view('pages.anime-genres', compact('genre', 'animes', 'forYouAnimes'));
    }

    public function showRecentlyAnimes()
    {
        $recentlyAnimes = Anime::orderBy('updated_at', 'desc')->get();
        $forYouAnimes = Anime::withCount('viewers')->orderBy('viewers_count', 'desc')->take(4)->get();

        return view('pages.anime-recently', compact('recentlyAnimes', 'forYouAnimes'));
    }
}