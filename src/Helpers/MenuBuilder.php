<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Support\Facades\Config;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\FontAwesomeIcon;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\MaterialIcon;

class MenuBuilder
{
	public static function build(): array
	{
		return self::processMenu(
			Config::get('mdp.menu', [])
		);
	}

	private static function processMenu(array $menuItems, bool $isChild = false): array
	{
		foreach ($menuItems as $index => $menuItem) {
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
				self::processMenu($menuItem['children'] ?? [], true),
				$isChild
			);
		}

		return $menuItems;
	}
}
