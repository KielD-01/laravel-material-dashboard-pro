<?php

declare(strict_types=1);

use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\FontAwesomeIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItemLinkType;

return [
    [
        'title' => 'Dashboard',
        'link' => [
            'type' => MenuItemLinkType::ROUTE,
            'route' => 'dashboard.index',
        ],
        'icon' => [MaterialIcon::class, 'dashboard'],
    ],
    [
        'title' => 'Users',
        'icon' => [FontAwesomeIcon::class, 'login'],
        'children' => [
            [
                'title' => 'Create User',
                'link' => [
                    'type' => MenuItemLinkType::ROUTE,
                    'route' => 'users.create',
                ],
            ]
        ]
    ],
];
