<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Helpers\Icons;

abstract class Icon
{
	private string $icon;
	private array $icons = [];

	public function __construct(string $icon)
	{
		$this->icon = $icon;
	}

	public function getIcon(): string
	{
		return $this->icon;
	}

	abstract public function buildIcon(): string;
}
