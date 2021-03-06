<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Support\Facades\Config;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\FontAwesomeIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;

class MenuBuilder
{
	public function build(): array
	{
		return $this->processMenu(
			Config::get('mdp.menu', [])
		);
	}

	private function processMenu(array $menuItems, bool $isChild = false): array
	{
		/** @var MenuVisibilityResolver $menuResolver */
		$menuResolver = resolve(Config::get('mdp.core.menu_permission_resolver'));

		foreach ($menuItems as $index => $menuItem) {
			if (!array_key_exists('can', $menuItem) || $menuResolver->resolve($menuItem['can'])) {
				$link = array_key_exists('link', $menuItem) ?
					$menuItem['link'] :
					['type' => MenuItemLinkType::URI, 'uri' => '#'];

				$hasIcon = array_key_exists('icon', $menuItem);

				/** @var FontAwesomeIcon|MaterialIcon $iconClass */
				$iconClass = null;
				$icon = null;

				if ($hasIcon) {
					[$iconClass, $icon] = $menuItem['icon'];
				}

				$menuItems[$index] = new MenuItem(
					$menuItem['title'],
					$link['type'],
					$link[$link['type']],
					$isChild && !$hasIcon ? null : new $iconClass($icon),
					$this->processMenu($menuItem['children'] ?? [], true),
					$isChild
				);
			} else {
				unset($menuItems[$index]);
			}
		}

		return $menuItems;
	}
}
