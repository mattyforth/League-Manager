<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Team;
use App\Observers\TeamObserver;
use App\Player;
use App\Observers\PlayerObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Team::observe(TeamObserver::class);
        Player::observe(PlayerObserver::class);
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
