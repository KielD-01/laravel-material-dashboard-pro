<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

abstract class MenuVisibilityResolver
{
	/**
	 * Check, if user can see specific menu
	 *
	 * @param string|array $roles
	 *
	 * @return bool
	 */
	abstract public function resolve($roles): bool;
}
