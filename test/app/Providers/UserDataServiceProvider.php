<?php

namespace App\Providers;

use App\Models\Receitas;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class UserDataServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            // Compartilhar dados do usuário com todas as views
            $view->with('receitas', Receitas::all());
            $view->with('users', User::all());
            $view->with('userData', Auth::user());
        });
    }

    public function register()
    {
        //
    }
}
