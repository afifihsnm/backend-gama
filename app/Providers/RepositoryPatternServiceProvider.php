<?php

namespace App\Providers;

use App\Repositories\MitraAuth\AuthRepository;
use App\Repositories\MitraAuth\AuthRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryPatternServiceProvider extends ServiceProvider
{
    public $singletons = [
        AuthRepository::class => AuthRepositoryImpl::class
    ];
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
        //
    }
}
