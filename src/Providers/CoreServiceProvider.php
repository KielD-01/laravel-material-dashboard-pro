<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;
use KielD01\LaravelMaterialDashboardPro\Providers\Composers\MdpViewComposer;
use KielD01\LaravelMaterialDashboardPro\View\Components\ComponentRegistrar;
use function sprintf;

class CoreServiceProvider extends ServiceProvider
{
    public const VIEWS_NAMESPACE = 'mdp';

    public function register(): void
    {
    }

    public function boot(Factory $view): void
    {
        $this->registerPublishableConfigs();
        $this->registerPublishableAssets();
        $this->registerViews();
        $this->registerViewComposers($view);
        $this->registerRoutes();
        $this->registerLocales();
        $this->registerComponents();
    }

    /**
     * @return void
     */
    public function registerComponents(): void
    {
        /** @var ComponentRegistrar $registrar */
        $registrar = resolve(ComponentRegistrar::class);
        $registrar->register();
    }

    public function registerPublishableConfigs(): void
    {
        $baseDir = __DIR__ . DIRECTORY_SEPARATOR . '..';
        $configs = sprintf('%s%s%s', $baseDir, DIRECTORY_SEPARATOR, 'config');
        $mdpCoreConfig = sprintf(
            '%s%s%s%s%s',
            $configs,
            DIRECTORY_SEPARATOR,
            'mdp',
            DIRECTORY_SEPARATOR,
            'core.php'
        );

        $mdpMenuConfig = sprintf(
            '%s%s%s%s%s',
            $configs,
            DIRECTORY_SEPARATOR,
            'mdp',
            DIRECTORY_SEPARATOR,
            'menu.php'
        );

        $this->publishes(
            [
                $mdpCoreConfig => config_path(
                    sprintf(
                        '%s%s%s',
                        'mdp',
                        DIRECTORY_SEPARATOR,
                        'core.php'
                    )
                ),
                $mdpMenuConfig => config_path(
                    sprintf(
                        '%s%s%s',
                        'mdp',
                        DIRECTORY_SEPARATOR,
                        'menu.php'
                    )
                ),
            ]
        );
    }

    public function registerPublishableAssets(): void
    {
        $packagePublic = __DIR__ . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'resources' . DIRECTORY_SEPARATOR .
            'assets';

        $this->publishes(
            [
                $packagePublic => public_path('assets/mdp'),
            ]
        );
    }

    public function registerViews(): void
    {
        $this->loadViewsFrom(
            __DIR__ . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'resources' . DIRECTORY_SEPARATOR .
            'views',
            static::VIEWS_NAMESPACE
        );
    }

    public function registerViewComposers(Factory $view): void
    {
        $view->composer('mdp::layouts.user.auth-v1', MdpViewComposer::class);
        $view->composer('mdp::layouts.main', MdpViewComposer::class);
    }

    public function registerRoutes(): void
    {
        if (Config::get('mdp.core.module.routes.enabled', false)) {
            $this->loadRoutesFrom(
                __DIR__ . DIRECTORY_SEPARATOR .
                '..' . DIRECTORY_SEPARATOR .
                'routes' . DIRECTORY_SEPARATOR .
                'mdp' . DIRECTORY_SEPARATOR .
                'auth.php'
            );

            $this->loadRoutesFrom(
                __DIR__ . DIRECTORY_SEPARATOR .
                '..' . DIRECTORY_SEPARATOR .
                'routes' . DIRECTORY_SEPARATOR .
                'mdp' . DIRECTORY_SEPARATOR .
                'dashboard.php'
            );
        }
    }

    public function registerLocales(): void
    {
        $baseDir = __DIR__ . DIRECTORY_SEPARATOR . '..';
        $locales = sprintf('%s%s%s', $baseDir, DIRECTORY_SEPARATOR, 'lang');

        $this->publishes([
            sprintf('%s/%s/mdp.php', $locales, 'ua') => lang_path(sprintf('%s/mdp.php', 'ua')),
            sprintf('%s/%s/mdp.php', $locales, 'en') => lang_path(sprintf('%s/mdp.php', 'en')),
            sprintf('%s/%s/mdp.php', $locales, 'kz') => lang_path(sprintf('%s/mdp.php', 'kz')),
        ], 'locales');
    }
}
