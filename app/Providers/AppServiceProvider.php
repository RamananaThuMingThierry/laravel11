<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use App\Http\Middleware\RoleMiddleware;
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

    public function boot(Router $router): void
    {
        // Enregistrer le middleware personnalisé 'role'
        $router->aliasMiddleware('role', RoleMiddleware::class);
    }   

}
