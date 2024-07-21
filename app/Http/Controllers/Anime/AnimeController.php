<?php

namespace App\Http\Controllers\Anime;

use App\Models\User;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{
    public function storeComment($user_id, $anime_id, $comments)
    {
        Comment::create([
            'user_id' => $user_id,
            'anime_id' => $anime_id,
            'comments' => $comments,
        ]);
    }

    public function detailAnime(Anime $anime)
    {
        $genreAnime = $anime->genres->first();
        $similiarAnime = Genre::select()->where('name', $genreAnime->name)->first()->animes->take(4);

        $comments = $anime->comments;

        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            if(!$user->viewedAnimes->contains($anime->id))
            {
                $user->viewedAnimes()->attach($anime->id, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return view('pages/anime-detail', compact('anime', 'similiarAnime', 'comments'));
    }

    public function addComment(Anime $anime, Request $request)
    {
        $this->storeComment(Auth::user()->id, $anime->id, $request->comment);

        if($request->has('watching'))
        {
            return redirect()->route('anime.watching', ['anime' => $anime->slug, 'episode_name' => $request->get('watching')]);
        }

        return redirect()->route('anime.detail', with(['anime' => $anime->slug]));
    }

    public function followAnime (Anime $anime)
    {
        $user = User::find(Auth::user()->id);
        $user->followedAnimes()->attach($anime->id);

        return redirect()->route('anime.detail', with(['anime' => $anime->slug]));
    }

    public function unfollowAnime (Anime $anime)
    {
        $user = User::find(Auth::user()->id);
        $user->followedAnimes()->detach($anime->id);

        return redirect()->route('anime.detail', ['anime' => $anime->slug]);
    }

    public function searchAnime(Request $request)
    {
        $anime = $request->search;

        $animeSearched = Anime::where("title", "like", "%$anime%")->get();

        return view('pages.anime-search', ['animes' => $animeSearched, 'search' => $anime]);
    }
}
