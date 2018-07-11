<?php

namespace Agjmills\MaterialDashboard;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/views/layouts/', 'MaterialDashboard');

        $this->publishes(
            [
                __DIR__ . '/assets' => public_path('/vendor/laravel-material-dashboard'),
            ], 'assets'
        );

        $this->publishes(
            [
                __DIR__ . '/config/laravel-material-dashboard.php' => config_path('/laravel-material-dashboard.php'),
            ], 'config'
        );
    }
}
