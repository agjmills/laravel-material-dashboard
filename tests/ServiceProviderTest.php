<?php

use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use Agjmills\LaravelMaterialDashboard\ServiceProvider;
use Agjmills\LaravelMaterialDashboard\Events\BuildingMenu;

class ServiceProviderTest extends TestCase
{
    public function testRegisterMenu()
    {
        $events = new Dispatcher();
        $config = new Repository(
            ['material-dashboard.menu' => ['item']]
        );

        $menuBuilder = $this->makeMenuBuilder();

        ServiceProvider::registerMenu($events, $config);

        $events->fire(new BuildingMenu($menuBuilder));

        $this->assertEquals(['item'], $menuBuilder->menu);
    }
}
