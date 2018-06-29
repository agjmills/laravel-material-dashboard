<?php

namespace Agjmills\LaravelMaterialDashboard;

use Agjmills\LaravelMaterialDashboard\Console\MakeMaterialDashboardCommand;
use Agjmills\LaravelMaterialDashboard\Console\MaterialDashboardMakeCommand;
use Agjmills\MaterialDashboard\Http\ViewComposers\MaterialDashboardComposer;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Agjmills\LaravelMaterialDashboard\Events\BuildingMenu;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(MaterialDashboard::class, function (Container $app) {
            return new MaterialDashboard(
                $app['config']['material-dashboard.filters'],
                $app['events'],
                $app
            );
        });
    }

    public function boot(
        Factory $view,
        Dispatcher $events,
        Repository $config
    ) {
        $this->loadViews();

        $this->publishConfig();

        $this->publishAssets();

        $this->registerCommands();

        $this->registerViewComposers($view);

        static::registerMenu($events, $config);
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views');

        $this->loadViewsFrom($viewsPath, 'material-dashboard');

        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/material-dashboard'),
        ], 'views');
    }

    private function publishConfig()
    {
        $configPath = $this->packagePath('config/material-dashboard.php');

        $this->publishes([
            $configPath => config_path('material-dashboard.php'),
        ], 'config');

        $this->mergeConfigFrom($configPath, 'material-dashboard');
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/material-dashboard'),
        ], 'assets');
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

    private function registerCommands()
    {
        // Laravel >=5.2 only
        if (class_exists('Illuminate\\Auth\\Console\\MakeAuthCommand')) {
            $this->commands(MakeMaterialDashboardCommand::class);
        } elseif (class_exists('Illuminate\\Auth\\Console\\AuthMakeCommand')) {
            $this->commands(MaterialDashboardMakeCommand::class);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('material-dashboard::page', MaterialDashboardComposer::class);
    }

    public static function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('material-dashboard.menu');
            call_user_func_array([$event->menu, 'add'], $menu);
        });
    }
}
