<?php

return [
    'dashboard_url' => '/admin',
    'logo' => '/img/logo/redrow.svg',
    'navigation_background_image' => '/img/logo/redrow-tree.svg',
    'menu' => [
        [
            'route' => 'admin.dashboard',
            'icon' => 'fa-tachometer',
            'text' => 'Dashboard',
        ],
        [
            'text' => 'Content Management',
            'links' => [
                [
                    'link' => '#',
                    'icon' => 'fa-file-text',
                    'text' => 'Can only see this if you can manage users',
                    'permissions' => [
                        'action' => 'manage',
                        'resource' => \App\User::class,
                    ],
                ],
                [
                    'route' => 'admin.users.edit',
                    'parameters' => 1,
                    'icon' => 'fa-file-text',
                    'text' => 'This will edit user id 1',
                ],
            ],
        ],
    ],
];