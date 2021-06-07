<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro;

use Illuminate\Http\Request;
use KielD01\LaravelMaterialDashboardPro\Helpers\MenuBuilder;

class MaterialDashboardPro
{
	private $request;
	private $menu = [];
	private $pageTitle = 'Page';

	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->setMenu();
	}

	public function getRandomBackgroundUrl(): string
	{
		return 'https://picsum.photos/2880/1920';
	}

	private function setMenu(): void
	{
		$this->menu = MenuBuilder::build();
	}

	public function hasUser(string $guard = null)
	{
		return $this->request->user($guard) ?? false;
	}

	public function getPageTitle(): string
	{
		return $this->pageTitle;
	}

	public function setPageTitle(string $pageTitle): self
	{
		$this->pageTitle = $pageTitle;

		return $this;
	}

	public function getMenu(): array
	{
		return $this->menu;
	}
}
