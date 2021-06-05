<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro;

use Illuminate\Http\Request;

class MaterialDashboardPro
{
	private $request;

	public function __construct(Request  $request) {
		$this->request = $request;
	}

	public function hasUser(string $guard = null) {
		return $this->request->user($guard) ?? false;
	}
}
