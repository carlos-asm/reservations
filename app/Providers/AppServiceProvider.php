<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        

        // Definir el permiso para gestionar reservas
        Gate::define('admin.reservations', function ($user) {
            return $user->hasRole('admin'); // Asegúrate de que el usuario tenga el rol de admin
        });
    }
}
