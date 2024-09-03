<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showFollowedAnimes()
    {
        $animes = Auth::user()->followedAnimes;
        // $user = User::find(Auth::user()->id)->first();
        // $animes = $user->followedAnimes;

        return view('pages.followed-animes', compact('animes'));
    }
}