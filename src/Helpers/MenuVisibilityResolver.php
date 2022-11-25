<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

abstract class MenuVisibilityResolver
{
	/**
	 * Check, if user can see specific menu
	 *
	 * @param mixed $valueOrValues
	 *
	 * @return bool
	 */
	abstract public function resolve(mixed $valueOrValues): bool;
}
