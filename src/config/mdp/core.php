<?php

declare(strict_types=1);

use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItemLinkType;

return [
	'module' => [
		'routes' => [
			'enabled' => false,
		],
	],
	'fixed_plugin' => [
		'enabled' => false,
		'images' => [],
	],

	'site' => [
		'url' => env('APP_URL'),
		'name' => env('APP_NAME', 'Laravel'),
		'abbr' => env('APP_NAME', 'L'),
	],

	'sidebar' => [
		'user' => [
			'avatar_placeholder' => 'https://randomuser.me/api/portraits/women/32.jpg',
		],
	],
	'nav_bar' => [
		'enabled' => false,

		// Panels
		'right_panel' => false,
		'search_panel' => false,
		'search_url' => [
			'type' => MenuItemLinkType::ROUTE,
			'route' => 'kield01.mdp.search',
		],

		'dashboard' => [
			'enabled' => false,
			'route' => null,
		],
		'profile' => [
			'enabled' => false,
			'route' => null,
		],
		'settings' => [
			'enabled' => false,
			'route' => null,
		],
		'log_out' => [
			'enabled' => false,
			'route' => null,
		],
	],

	// Only route support
	'sign_in' => 'kield01.mdp.user.login',
	'sign_up' => 'kield01.mdp.user.register',
	'log_out' => null,
];
