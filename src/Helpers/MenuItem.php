<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Support\Collection;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\Icon;
use Ramsey\Uuid\Uuid;

class MenuItem
{
	private $title;
	private $menuItemLinkType;
	private $link;
	private $icon;
	private $children;
	private $hash;
	private $abbr;

	public function __construct(
		string $title,
		string $menuItemLinkType,
		string $link,
		Icon $icon = null,
		array $children = []
	) {
		$this->title = $title;
		$this->menuItemLinkType = $menuItemLinkType;
		$this->link = $link;
		$this->icon = $icon;
		$this->children = collect($children);
		$this->hash = Uuid::fromString(md5($this->title));
		$this->setAbbr();
	}

	public function getMenuItemHash(): string
	{
		return $this->hash->toString();
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getLink(): string
	{
		$uri = null;

		switch ($this->hasChildren()) {
			case true:
				$uri = \sprintf('#%s', $this->getMenuItemHash());
				break;
			case false:
				switch ($this->menuItemLinkType) {
					case MenuItemLinkType::ROUTE:
						$uri = route($this->link);
						break;
					case MenuItemLinkType::URI:
						$uri = $this->link;
						break;
				}
				break;
		}

		return $uri;
	}

	public function hasIcon(): bool
	{
		return !is_null($this->getIcon()) && $this->getIcon() instanceof Icon;
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

	public function getAbbr(): string
	{
		return $this->abbr;
	}

	private function setAbbr()
	{
		$words = explode(' ', $this->getTitle());
		$abbrArray = array_map(
			static function ($word) {
				$e = explode('', $word);

				return mb_strtoupper(current($e));
			},
			$words
		);

		$this->abbr = implode('', $abbrArray);
	}
}
