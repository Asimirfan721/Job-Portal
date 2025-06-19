<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Add these if you use RoleMiddleware and Route
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

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
        // Register middleware if RoleMiddleware exists
        if (class_exists(\App\Http\Middleware\RoleMiddleware::class)) {
            app('router')->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
        }
        // Remove $this->routes() from here, it's not needed in AppServiceProvider
    }
}
