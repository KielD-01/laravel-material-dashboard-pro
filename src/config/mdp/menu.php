<?php

declare(strict_types=1);

use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItem;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuItemLinkType;

return [
	new MenuItem(
		'Dashboard',
		MenuItemLinkType::ROUTE,
		'admin.dashboard',
		new MaterialIcon('dashboard'),
		[]
	),
];
