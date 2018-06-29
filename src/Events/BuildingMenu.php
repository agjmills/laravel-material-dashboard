<?php

namespace Agjmills\LaravelMaterialDashboard\Events;

use Agjmills\LaravelMaterialDashboard\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}
