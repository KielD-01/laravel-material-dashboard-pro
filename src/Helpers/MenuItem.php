<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Support\Collection;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\Icon;

class MenuItem
{
	private $title;
	private $menuItemLinkType;
	private $link;
	private $icon;
	private $children;

	public function __construct(
		string $title,
		string $menuItemLinkType,
		string $link,
		Icon $icon,
		array $children = []
	) {
		$this->title = $title;
		$this->menuItemLinkType = $menuItemLinkType;
		$this->link = $link;
		$this->icon = $icon;
		$this->children = collect($children);
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getLink(): string
	{
		$uri = null;
		switch ($this->menuItemLinkType) {
			case MenuItemLinkType::ROUTE:
				$uri = route($this->link);
				break;
			case MenuItemLinkType::URI:
				$uri = $this->link;
				break;
		}

		return $uri;
	}

	public function getIcon(): Icon
	{
		return $this->icon;
	}

	public function hasChildren(): bool
	{
		return $this->children->isNotEmpty();
	}

	public function getChildren(): Collection
	{
		return $this->children;
	}
}
