<?php

namespace Agjmills\MaterialDashboard;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/views/layouts/', 'MaterialDashboard');

        $this->publishes(
            [
                __DIR__ . '/assets' => public_path('/vendor/laravel-material-dashboard')
            ],
            'assets'
        );

        $this->publishes(
            [
                __DIR__ . '/config/laravel-material-dashboard.php' => config_path('/laravel-material-dashboard.php')
            ],
            'config'
        );
    }

    public function register(): void
    {
        //
    }
}
