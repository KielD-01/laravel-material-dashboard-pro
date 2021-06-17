<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Support\Facades\Config;

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

            $menuItems[$index] = new MenuItem(
                $menuItem['title'],
                $link['type'],
                $link[$link['type']],
                $isChild ? null : $menuItem['icon'],
                self::processMenu($menuItem['children'] ?? [], true),
                $isChild
            );
        }

        return $menuItems;
    }
}
