<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Anime\AnimeController;


Auth::routes();

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home');

Route::get('/anime/{anime:slug}', [AnimeController::class, 'detailAnime'])->name('anime.detail');
