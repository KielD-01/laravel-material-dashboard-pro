<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\App\Http\Controllers;

use App\Http\Controllers\Controller;

class TestAuthController extends Controller
{
	public function login()
	{
		return view('mdp::pages.user.login');
	}

	public function register()
	{
		return view('mdp::pages.user.register');
	}
}
