<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;
use KielD01\LaravelMaterialDashboardPro\Providers\Composers\MdpViewComposer;

class CoreServiceProvider extends ServiceProvider
{
	public function register()
	{
	}

	public function boot(Factory $view)
	{
		$this->registerPublishableConfigs();
		$this->registerPublishableAssets();
		$this->registerViews();
		$this->registerViewComposers($view);
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

	public function registerViewComposers(Factory $view)
	{
		$view->composer('mdp::layouts.main', MdpViewComposer::class);
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
			'menu.php'
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
