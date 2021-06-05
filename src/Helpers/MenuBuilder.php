<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

class MenuBuilder
{
	public static function build() {
		$menuItems = collect(config('mdp.menu', []));

		return $menuItems;
	}
}
