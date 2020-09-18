<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Observers\UserObserver;
use App\Servant;
use App\Observers\ServantObserver;
use App\Pdf;
use App\Observers\PdfObserver;
use App\Edict;
use App\Observers\EdictObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Servant::observe(ServantObserver::class);
        Pdf::observe(PdfObserver::class);
        Edict::observe(EdictObserver::class);
    }
}
