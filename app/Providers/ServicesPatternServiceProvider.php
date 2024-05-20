<?php

namespace App\Providers;

use App\Repositories\MitraAuth\AuthRepository;
use App\Services\MitraAuth\AuthService;
use App\Services\MitraAuth\AuthServiceImpl;
use Illuminate\Support\ServiceProvider;

class ServicesPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthService::class, function() {
            return new AuthServiceImpl($this->app->make(AuthRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
