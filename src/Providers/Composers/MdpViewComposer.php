<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Providers\Composers;

use Illuminate\View\View;
use KielD01\LaravelMaterialDashboardPro\MaterialDashboardPro;

class MdpViewComposer
{
	/** @var MaterialDashboardPro  */
	private $mdp;

	public function __construct(MaterialDashboardPro $mdp)
	{
		$this->mdp = $mdp;
	}

	public function compose(View $view): void
	{
		$view->with('mdp', $this->mdp);
	}
}
