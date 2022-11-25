<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

class DemoMenuVisibilityResolver extends MenuVisibilityResolver
{
    /**
     * @inheritDoc
     */
    public function resolve(mixed $valueOrValues): bool
    {
        return in_array('sudo', $valueOrValues, true);
    }
}
