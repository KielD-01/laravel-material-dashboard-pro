<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Http\Controllers;

use App\Http\Controllers\Controller;

class TestDashboardController extends Controller
{
	public function dashboard()
	{
		return view('mdp::pages.dashboard.index');
	}
}
