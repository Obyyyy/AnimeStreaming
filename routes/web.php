<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Anime\AnimeController;
use App\Http\Controllers\Anime\EpisodeController;


Auth::routes();

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home');

Route::get('/anime/{anime:slug}', [AnimeController::class, 'detailAnime'])->name('anime.detail');
Route::post('/anime/{anime:slug}/comment', [AnimeController::class, 'addComment'])->middleware(['isLogin'])->name('anime.add.comment');
Route::post('/anime/{anime:slug}/follow', [AnimeController::class, 'followAnime'])->middleware(['isLogin'])->name('anime.follow');
Route::post('/anime/{anime:slug}/unfollow', [AnimeController::class, 'unfollowAnime'])->middleware(['isLogin'])->name('anime.unfollow');
Route::get('/anime/{anime:slug}/episode/{episode_name}', [EpisodeController::class, 'watchingAnime'])->name('anime.watching');

Route::get('/anime/genre/{genre:slug}', [PageController::class, 'showAnimeByGenres'])->name('anime.by.genres');