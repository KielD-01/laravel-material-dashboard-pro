<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

class DemoMenuVisibilityResolver extends MenuVisibilityResolver
{
	/**
	 * @inheritDoc
	 */
	public function resolve($roles): bool
	{
		return in_array('sudo', $roles, true);
	}
}
