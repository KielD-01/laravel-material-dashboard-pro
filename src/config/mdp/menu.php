<?php

declare(strict_types=1);

use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItemLinkType;

return [
	[
		'title' => 'Dashboard',
		'link' => [
			'type' => MenuItemLinkType::ROUTE,
			'route' => 'admin.dashboard',
		],
		'icon' => new MaterialIcon('dashboard'),
		'children' => [
			[
				'title' => 'Test child 1',
				'link' => [
					'type' => MenuItemLinkType::ROUTE,
					'route' => 'admin.dashboard.child_one',
				],
				'icon' => new MaterialIcon('dashboard'),
				'children' => [
					[
						'title' => 'Test child 1 - 1',
						'link' => [
							'type' => MenuItemLinkType::ROUTE,
							'route' => 'admin.dashboard.child_two_of_child_one',
						],
						'icon' => new MaterialIcon('dashboard'),
					],
				],
			],
		],
	],
];
