<?php

namespace App\Http\Controllers\Anime;

use App\Models\Anime;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

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
        $similiarAnime = Anime::select()->where('genres', $anime->genres)->where('id', '!=', $anime->id)->take(4)->get();
        $comments = $anime->comments;
        return view('pages.anime-detail', compact('anime', 'similiarAnime', 'comments'));
    }

    public function addComment(Anime $anime, Request $request)
    {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->storeComment(Auth::user()->id, $anime->id, $request->comment);

        return redirect()->route('anime.detail', with(['anime' => $anime->slug]));
    }

    public function followAnime (Anime $anime)
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->route('login');
        }

        $user->followedAnimes()->attach($anime->id);

        return redirect()->route('anime.detail', with(['anime' => $anime->slug]));
    }

    public function unfollowAnime (Anime $anime)
    {
        $user = User::find(Auth::user()->id);
    if (!$user) {
            return redirect()->route('login');
        }

        // User::first()->followedAnime()->get();
        // $user->followedAnimes()->detach($anime->id);
        $user->followedAnimes()->detach($anime->id);

        return redirect()->route('anime.detail', ['anime' => $anime->slug]);
    }
}