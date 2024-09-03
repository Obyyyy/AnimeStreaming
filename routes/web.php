<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Anime\AnimeController;
use App\Http\Controllers\Anime\EpisodeController;
use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\AnimeDashboardController;
use App\Http\Controllers\Dashboard\EpisodeDashboardController;

Auth::routes();

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home');

Route::prefix('anime')->group(function()
{
    Route::group(['middleware' => 'isLogin'], function()
    {
        Route::post('/{anime:slug}/comment', [AnimeController::class, 'addComment'])->name('anime.add.comment');
        Route::post('/{anime:slug}/follow', [AnimeController::class, 'followAnime'])->name('anime.follow');
        Route::post('/{anime:slug}/unfollow', [AnimeController::class, 'unfollowAnime'])->name('anime.unfollow');
    });

    Route::get('/recent', [PageController::class, 'showRecentlyAnimes'])->name('anime.recently');
    Route::get('/{anime:slug}', [AnimeController::class, 'detailAnime'])->name('anime.detail');
    Route::get('/{anime:slug}/episode/{episode_name}', [EpisodeController::class, 'watchingAnime'])->name('anime.watching');
    Route::get('/genre/{genre:slug}', [PageController::class, 'showAnimeByGenres'])->name('anime.by.genres');
    Route::any('/search', [AnimeController::class, 'searchAnime'])->name('anime.search');
});

Route::get('/user/followed-animes', [UserController::class, 'showFollowedAnimes'])->middleware('isLogin')->name('user.followed.animes');

// Routes for Admin Dashboard
Route::group(['prefix'=>'admin/dashboard'], function()
{
    Route::group(['middleware' => 'AdminLoggedIn'], function()
    {
        Route::get('login', [AdminController::class, 'viewAdminLogin'])->name('admin.view.login');
        Route::post('login', [AdminController::class, 'adminLogin'])->name('admin.login');
    });

    Route::group(['middleware' => 'isAdminLogin'], function()
    {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

        Route::prefix('admins')->group(function() {
            Route::get('/', [AdminController::class, 'getAdmins'])->name('admin.admins');
            Route::get('/add-admin', [AdminController::class, 'formAddAdmin'])->name('admin.form.admins');
            Route::post('/add-admin', [AdminController::class, 'addAdmin'])->name('admin.add.admins');
            Route::get('/edit/{admin:email}', [AdminController::class, 'formEditAdmin'])->name('admin.form.edit.admins');
            Route::post('/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit.admins');
            Route::delete('/{admin:email}/delete', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admins');
        });

        Route::prefix('animes')->group(function () {
            Route::get('/', [AnimeDashboardController::class, 'getAnimes'])->name('admin.animes');
            Route::get('/add', [AnimeDashboardController::class, 'formAddAnime'])->name('admin.form.add.animes');
            Route::post('/add', [AnimeDashboardController::class, 'addAnime'])->name('admin.add.animes');
            Route::get('/edit/{anime:slug}', [AnimeDashboardController::class, 'formEditAnime'])->name('admin.form.edit.animes');
            Route::post('/edit/{anime:slug}', [AnimeDashboardController::class, 'editAnime'])->name('admin.edit.animes');
            Route::delete('/delete/{anime:slug}', [AnimeDashboardController::class, 'deleteAnime'])->name('admin.delete.animes');
        });

        Route::prefix('genres')->group(function () {
            Route::get('/', [GenreController::class, 'getGenres'])->name('admin.genres');
            Route::get('/add', [GenreController::class, 'formAddGenre'])->name('admin.form.add.genres');
            Route::post('/add', [GenreController::class, 'addGenre'])->name('admin.add.genres');
            Route::delete('/{genre:slug}/delete', [GenreController::class, 'deleteGenre'])->name('admin.delete.genres');
            Route::get('/edit/{genre:slug}', [GenreController::class, 'formEditGenre'])->name('admin.form.edit.genres');
            Route::post('/edit/{genre:slug}', [GenreController::class, 'editGenre'])->name('admin.edit.genres');
        });

        Route::prefix('episodes')->group(function() {
            Route::get('/', [EpisodeDashboardController::class, 'getEpisodes'])->name('admin.episodes');
            Route::get('/add', [EpisodeDashboardController::class, 'formAddEpisode'])->name('admin.form.add.episodes');
            Route::post('/add', [EpisodeDashboardController::class, 'addEpisode'])->name('admin.add.episodes');
            Route::delete('/episode/{id}/delete', [EpisodeDashboardController::class, 'deleteEpisode'])->name('admin.delete.episodes');

            Route::get('/edit/{id}', [EpisodeDashboardController::class, 'formEditEpisode'])->name('admin.form.edit.episodes');
            Route::post('/edit/{id}', [EpisodeDashboardController::class, 'editEpisode'])->name('admin.edit.episodes');
        });
    });
});