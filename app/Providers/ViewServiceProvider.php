<?php

namespace App\Providers;

use App\Models\livre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.pages.*', function ($view) {
            $livres = livre::query();
            $livres = $livres->with("categories", "favories", "reserver", "consulter", "emplacement")->orderBy("titre")->get();

            $view->with('livres', $livres);
        });
        View::composer('admin.*', function ($view) {
            $userFavorie = User::with("favories", "consulter", "reserver")->where("id", Auth::user()->id)->first();
            // dd($userFavorie->consulter->load("livre")->pluck('statu')->filter(function ($statu) {
            //     return $statu == '1' ;
            // }));
            $UserLivrePreter = $userFavorie->consulter->load("livre")->filter(function ($consultation) {
                return $consultation->statu == '1';
            });
            //  dd(Auth::user()->favories);
            // dd($userFavorie->consulter[0]->load("livre"));
            // Cloner les résultats de la première requête
            $view->with('userFavorie', $userFavorie);
            $view->with('UserLivrePreter', $UserLivrePreter);
        });
    }
}
