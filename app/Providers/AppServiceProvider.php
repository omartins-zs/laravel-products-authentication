<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Log\Events\MessageLogged;
use App\Listeners\LogDatabaseListener;
use Illuminate\Support\Facades\Event;
use App\Observers\HardwareProductObserver;
use App\Models\HardwareProduct;


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
        // Registrar o listener para o evento MessageLogged
        Event::listen(
            MessageLogged::class,
            LogDatabaseListener::class
        );


        // Registro de Observers
        HardwareProduct::observe(HardwareProductObserver::class);
    }
}
