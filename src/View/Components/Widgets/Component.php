<?php

namespace KielD01\LaravelMaterialDashboardPro\View\Components\Widgets;

use Illuminate\Support\Facades\Blade;

abstract class Component extends \Illuminate\View\Component
{
    protected static string $name;

    public static function getComponentName(): string
    {
        return self::$name;
    }
}