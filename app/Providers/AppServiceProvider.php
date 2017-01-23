<?php

namespace App\Providers;

use App\User;
use App\Userdetails;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            $userdetails = new Userdetails;
            $userdetails->id = $user->id;
            $userdetails->save();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
