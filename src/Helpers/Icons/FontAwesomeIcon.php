<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers\Icons;

class FontAwesomeIcon extends Icon
{
	public function buildIcon(): string
	{
		return \sprintf(
			'<i class="fa fa-%s"></i>',
			$this->getIcon()
		);
	}
}
