<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepositorio;
use App\Repositories\SeriesRepositorio;
use Illuminate\Support\ServiceProvider;

class SeriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SeriesRepositorio::class, EloquentSeriesRepositorio::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
