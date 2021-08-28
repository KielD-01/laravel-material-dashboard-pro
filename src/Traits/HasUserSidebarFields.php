<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Traits;

/**
 * Trait HasSidebarFields
 * @package KielD01\LaravelMaterialDashboardPro\Traits
 * @property array attributes
 * @property array appends
 */
trait HasUserSidebarFields
{
	protected $nameFields = [];
	protected $avatarField = 'avatar';

	public function initialize(): void
	{
		$this->appends = array_merge(
			$this->appends,
			['name', 'userAvatar']
		);
	}

	public function getNameAttribute(): string
	{
		$name = [];

		foreach ($this->nameFields as $field) {
			if (array_key_exists($field, $this->attributes)) {
				$name[] = $field;
			}
		}

		return implode(' ', $name);
	}

	public function getUserAvatarAttribute()
	{
		if (!array_key_exists($this->avatarField, $this->attributes)) {
			return;
		}
	}
}
