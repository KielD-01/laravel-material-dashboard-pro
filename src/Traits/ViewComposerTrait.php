<?php
declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Traits;

use Illuminate\View\View;

/**
 * Trait ViewComposerTrait
 * @package KielD01\LaravelMaterialDashboardPro\Traits
 */
trait ViewComposerTrait
{
	protected function setPageTitle(string $pageTitle): void
	{
		view()
			->composer(
				['mdp::layouts.main', 'mdp::layouts.user.auth-v1'],
				static function (View $view) use ($pageTitle) {
					$data = $view->getData();

					if (array_key_exists('mdp', $data)) {
						$data['mdp']->setPageTitle($pageTitle);
					}

					$view->with($data);
				}
			);
	}
}
