<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $animes = Anime::select()->take(3)->get();
        $trendingAnimes = Anime::select()->orderBy('title', 'desc')->take(6)->get();
        $adventureAnimes = Anime::select()->where('genres', 'Adventure')->take(6)->get();
        $liveAnimes = Anime::select()->where('genres', 'Magic')->take(6)->get();
        $recentlyAnimes = Anime::select()->latest()->take(6)->get();
        $forYouAnimes = Anime::select()->where('genres', 'Romance')->take(4)->get();

        return view('home', compact('animes', 'trendingAnimes', 'adventureAnimes', 'liveAnimes','recentlyAnimes', 'forYouAnimes'));
    }
}