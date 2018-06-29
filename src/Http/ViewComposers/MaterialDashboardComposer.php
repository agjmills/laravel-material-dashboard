<?php

namespace Agjmills\MaterialDashboard\Http\ViewComposers;

use Illuminate\View\View;
use JeroenNoten\LaravelAdminLte\MaterialDashboard;

class MaterialDashboardComposer
{
    /**
     * @var MaterialDashboard
     */
    private $materialDashboard;

    public function __construct(
        MaterialDashboard $materialDashboard
    ) {
        $this->materialDashboard = $materialDashboard;
    }

    public function compose(View $view)
    {
        $view->with('material-dashboard', $this->materialDashboard);
    }
}
