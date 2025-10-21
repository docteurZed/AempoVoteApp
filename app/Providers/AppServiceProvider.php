<?php

namespace App\Providers;

use App\Models\Candidat;
use Illuminate\Support\Facades\Auth;
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
        View::composer(['candidate.*'], function ($view) {
            if (Auth::check()) {
                $profil = Candidat::where('user_id', Auth::id())->first()->photo;
                $view->with('profil', $profil);
            }
        });
    }
}
