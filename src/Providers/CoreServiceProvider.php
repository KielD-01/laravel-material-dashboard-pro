<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;
use KielD01\LaravelMaterialDashboardPro\Providers\Composers\MdpViewComposer;

use function sprintf;

class CoreServiceProvider extends ServiceProvider
{
	public function register(): void
	{
	}

	public function boot(Factory $view): void
	{
		$this->registerPublishableConfigs();
		$this->registerPublishableAssets();
		$this->registerViews();
		$this->registerViewComposers($view);
	}

	public function registerPublishableConfigs(): void
	{
		$baseDir = __DIR__.DIRECTORY_SEPARATOR.'..';
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
		$packagePublic = __DIR__.DIRECTORY_SEPARATOR.
			'..'.DIRECTORY_SEPARATOR.
			'resources'.DIRECTORY_SEPARATOR.
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
			__DIR__.DIRECTORY_SEPARATOR.
			'..'.DIRECTORY_SEPARATOR.
			'resources'.DIRECTORY_SEPARATOR.
			'views',
			'mdp'
		);
	}

	public function registerViewComposers(Factory $view): void
	{
		$view->composer('mdp::layouts.main', MdpViewComposer::class);
	}
}
