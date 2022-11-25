<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Http\Controllers;

use Illuminate\Routing\Controller;

class TestDashboardController extends Controller
{
	public function dashboard(): string
	{
		return view('mdp::pages.dashboard.index')->render();
	}
}
