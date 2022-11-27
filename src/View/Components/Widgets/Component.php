<?php

namespace KielD01\LaravelMaterialDashboardPro\View\Components\Widgets;

abstract class Component extends \Illuminate\View\Component
{
    protected static ?string $name = null;

    public static function getComponentName(): ?string
    {
        return static::$name;
    }
}