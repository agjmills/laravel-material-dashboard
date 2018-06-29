<?php

namespace Agjmills\LaravelMaterialDashboard\Menu\Filters;

use Agjmills\LaravelMaterialDashboard\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}
