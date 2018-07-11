<?php

namespace Agjmills\MaterialDashboard;

use Illuminate\Support\ServiceProvider;

class MaterialDashboardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'MaterialDashboard');

        $this->publishes(
            [
                __DIR__ . '/views' => base_path('resources/views/vendor/laravel-material-dashboard'),
                __DIR__ . '/assets' => base_path('public/vendor/laravel-material-dashboard'),
            ]
        );
    }

    public function register(): void
    {
        //
    }
}
