<?php

declare(strict_types=1);

use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItemLinkType;

return [
	[
		'title' => 'Dashboard',
		'link' => [
			'type' => MenuItemLinkType::ROUTE,
			'route' => 'kield01.mdp.dashboard.index',
		],
		'icon' => new MaterialIcon('dashboard'),
	],
	[
		'title' => 'Sign In',
		'link' => [
			'type' => MenuItemLinkType::ROUTE,
			'route' => 'kield01.mdp.user.login',
		],
		'icon' => new MaterialIcon('login'),
	],
	[
		'title' => 'Sign Up',
		'link' => [
			'type' => MenuItemLinkType::ROUTE,
			'route' => 'kield01.mdp.user.register',
		],
		'icon' => new MaterialIcon('fingerprint'),
	],
];
