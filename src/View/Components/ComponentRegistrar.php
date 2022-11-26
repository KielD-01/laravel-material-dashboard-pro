<?php

namespace KielD01\LaravelMaterialDashboardPro\View\Components;

use Illuminate\Support\Facades\Blade;
use KielD01\LaravelMaterialDashboardPro\View\Components\Widgets\CardWidget;

final class ComponentRegistrar
{
    private array $components = [
        CardWidget::class
    ];

    public function register(): void
    {
        array_map(
            fn(string $class) => Blade::component(
                forward_static_call(
                    sprintf('%s::getComponentName', $class)
                ),
                $class
            ),
            $this->components
        );
    }
}