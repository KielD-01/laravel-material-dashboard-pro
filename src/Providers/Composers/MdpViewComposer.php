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
		$mdp = collect($view->getData());

		if ($mdp->has('mdp.pageTitle')) {
			$this->mdp->setPageTitle($mdp->get('mdp.pageTitle'));
		}

		$view->with('mdp', $this->mdp);
	}
}
