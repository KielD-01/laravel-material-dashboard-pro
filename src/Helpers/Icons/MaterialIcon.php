<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers\Icons;

class MaterialIcon extends Icon
{
	public function buildIcon(): string
	{
		return \sprintf(
			'<i class="material-icons">%s</i>',
			$this->getIcon()
		);
	}
}
