<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
	public function register()
	{
	}

	public function boot()
	{
		$this->registerPublishableConfigs();
		$this->registerPublishableAssets();
		$this->registerViews();
	}

	public function registerViews()
	{
		$this->loadViewsFrom(
			__DIR__.DIRECTORY_SEPARATOR.
			'..'.DIRECTORY_SEPARATOR.
			'resources'.DIRECTORY_SEPARATOR.
			'views',
			'mdp'
		);
	}

	public function registerPublishableAssets()
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

	public function registerPublishableConfigs()
	{
		$baseDir = __DIR__.DIRECTORY_SEPARATOR.'..';
		$configs = \sprintf('%s%s%s', $baseDir, DIRECTORY_SEPARATOR, 'config');
		$mdpCoreConfig = \sprintf(
			'%s%s%s%s%s',
			$configs,
			DIRECTORY_SEPARATOR,
			'mdp',
			DIRECTORY_SEPARATOR,
			'core.php'
		);

		$mdpMenuConfig = \sprintf(
			'%s%s%s%s%s',
			$configs,
			DIRECTORY_SEPARATOR,
			'mdp',
			DIRECTORY_SEPARATOR,
			'core.php'
		);

		$this->publishes(
			[
				$mdpCoreConfig => config_path(
					\sprintf(
						'%s%s%s',

						'mdp',
						DIRECTORY_SEPARATOR,
						'core.php'
					)
				),
				$mdpMenuConfig => config_path(
					\sprintf(
						'%s%s%s',
						'mdp',
						DIRECTORY_SEPARATOR,
						'menu.php'
					)
				),
			]
		);
	}
}
