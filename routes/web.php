<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Anime\AnimeController;
use App\Http\Controllers\Anime\EpisodeController;


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

    Route::get('/{anime:slug}', [AnimeController::class, 'detailAnime'])->name('anime.detail');
    Route::get('/{anime:slug}/episode/{episode_name}', [EpisodeController::class, 'watchingAnime'])->name('anime.watching');
    Route::get('/genre/{genre:slug}', [PageController::class, 'showAnimeByGenres'])->name('anime.by.genres');
    Route::any('/search', [AnimeController::class, 'searchAnime'])->name('anime.search');
});

Route::get('/user/followed-animes', [UserController::class, 'showFollowedAnimes'])->middleware('isLogin')->name('user.followed.animes');

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
        Route::get('admins', [AdminController::class, 'getAdmins'])->name('admin.admins');
        Route::get('admins/add-admin', [AdminController::class, 'formAddAdmin'])->name('admin.form.admins');
        Route::post('admins/add-admin', [AdminController::class, 'addAdmin'])->name('admin.add.admins');
        Route::get('admins/edit/{admin:email}', [AdminController::class, 'formEditAdmin'])->name('admin.edit.admins');
        Route::post('admins/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.form.edit.admins');
        Route::delete('admins/{admin:email}/delete', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admins');

        Route::get('animes', [AdminController::class, 'getAnimes'])->name('admin.animes');
        Route::get('animes/add-anime', [AdminController::class, 'formAddAnime'])->name('admin.form.animes');
    });
});