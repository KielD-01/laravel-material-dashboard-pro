<?php

namespace KielD01\LaravelMaterialDashboardPro\View\Components\Widgets;

use KielD01\LaravelMaterialDashboardPro\Providers\CoreServiceProvider;

class CardWidget extends Component
{

    protected static string $name = 'card-widget';

    public function __construct(public string $title, public string $description)
    {
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return view(
            sprintf(
                '%s::%s',
                CoreServiceProvider::VIEWS_NAMESPACE,
                'elements.widgets.simple-card'
            )
        )
            ->render();
    }
}