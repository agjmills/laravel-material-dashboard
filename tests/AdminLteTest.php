<?php

use Agjmills\LaravelMaterialDashboard\Events\BuildingMenu;

class MaterialDashboardTest extends TestCase
{
    public function testMenu()
    {
        $materialDashboard = $this->makeMaterialDashboard();

        $this->getDispatcher()->listen(
            BuildingMenu::class,
            function (BuildingMenu $event) {
                $event->menu->add(['text' => 'Home']);
            }
        );

        $menu = $materialDashboard->menu();

        $this->assertEquals('Home', $menu[0]['text']);
    }
}
