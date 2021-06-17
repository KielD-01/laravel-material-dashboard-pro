<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use KielD01\LaravelMaterialDashboardPro\Helpers\Icons\Icon;
use Ramsey\Uuid\Uuid;

use function mb_strpos;
use function sprintf;

class MenuItem
{
	private $request;
	private $title;
	private $menuItemLinkType;
	private $link;
	private $baseLink;
	private $icon;
	private $children;
	private $hash;
	private $abbr;
	private $isChild;
	private $classes = [
		'nav-item',
	];

	public function __construct(
		string $title,
		string $menuItemLinkType,
		string $link,
		Icon $icon = null,
		array $children = [],
		bool $isChild = false
	) {
		$this->title = $title;
		$this->menuItemLinkType = $menuItemLinkType;
		$this->link = $this->baseLink = $link;
		$this->icon = $icon;
		$this->children = collect($children);
		$this->isChild = $isChild;
		$this->hash = Uuid::fromString(md5($this->title));
		$this->request = resolve(Request::class);

		$this->setAbbr();
		$this->setActive();
	}

	private function setAbbr(): void
	{
		$words = explode(' ', $this->getTitle());
		$abbrArray = array_map(
			static function ($word) {
				return mb_strtoupper($word[0]);
			},
			$words
		);

		$abbrString = implode('', $abbrArray);
		$this->abbr = preg_replace(
			'/([^0-9A-Za-z])/',
			'',
			$abbrString
		);
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	private function setActive()
    {
		/** @var Route $route */
		$route = $this->request->route();

		if (!is_null($route)) {
			switch ($this->menuItemLinkType) {
				case MenuItemLinkType::ROUTE:
					if ($this->getBaseLink() === $route->getName()) {
						$this->classes[] = 'active';
					}

					break;
				case MenuItemLinkType::URI:
					$match0 = mb_strpos(
							$route->uri(),
							$this->getBaseLink()
						) === 0;

					if ($match0) {
						$this->classes[] = 'active';
					}
					break;
			}
		}
	}

	private function getBaseLink(): string
	{
		return $this->baseLink;
	}

	public function getLink(): string
	{
		$uri = '#';

		switch ($this->hasChildren()) {
			case true:
				$uri = sprintf('#%s', $this->getMenuItemHash());
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

	public function hasChildren(): bool
	{
		return $this->children->isNotEmpty();
	}

	public function getMenuItemHash(): string
	{
		return $this->hash->toString();
	}

	public function hasIcon(): bool
	{
		return !is_null($this->getIcon());
	}

	public function getIcon(): ?Icon
	{
		return $this->icon;
	}

	public function isChild(): bool
	{
		return $this->isChild;
	}

	public function getChildren(): Collection
	{
		return $this->children;
	}

	public function getAbbr(): string
	{
		return $this->abbr;
	}

	public function getClasses(): string
	{
		return implode(' ', $this->classes);
	}
}
