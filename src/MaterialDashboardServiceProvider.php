<?php

namespace Agjmills\MaterialDashboard;

use Illuminate\Support\ServiceProvider;

class MaterialDashboardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/views/layouts/', 'MaterialDashboard');

        $this->publishes(
            [
                __DIR__ . '/assets' => base_path('public/vendor/laravel-material-dashboard'),
                __DIR__ . '/config' => base_path('config'),
            ]
        );
    }

    public function register(): void
    {
        //
    }
}
