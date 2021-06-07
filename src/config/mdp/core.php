<?php

declare(strict_types=1);

return [
	'module' => [
		'routes' => [
			'enabled' => false
		]
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
		'search_url' => '#',

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
];
