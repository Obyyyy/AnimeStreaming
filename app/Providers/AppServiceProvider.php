<?php

namespace App\Providers;

use App\Models\Genre;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::share('categories', Genre::all());

        View::composer('*', function ($view) {
            $view->with('genres', Genre::all());
        });
    }
}