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
			'resources',
			'mdp'
		);
	}

	public function registerPublishableAssets()
	{
		$this->publishes(
			[
				__DIR__.'..'.DIRECTORY_SEPARATOR.'public' => public_path('assets/mdp'),
			]
		);
	}

	public function registerPublishableConfigs()
	{
		$baseDir = __DIR__.DIRECTORY_SEPARATOR.'..';
		$configs = \sprintf('%s%s%s', $baseDir, DIRECTORY_SEPARATOR, 'config');
		$mdpConfig = \sprintf('%s%s%s', $configs, DIRECTORY_SEPARATOR, 'mdp.php');

		$this->publishes(
			[
				$mdpConfig => config_path('mdp.php'),
			]
		);
	}
}
