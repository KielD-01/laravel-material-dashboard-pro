<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestAuthController extends Controller
{
	public function login()
	{
		return view('mdp::pages.user.login');
	}

	public function auth(Request $request)
	{
		$credentials = $request->only(['email', 'password']);
		[$email, $password] = $credentials;

		$emailCheck = Str::is('john.doe@example.com', $email);
		$passwordCheck = Str::is('adminTest!123', $password);
		$checksPassed = $emailCheck && $passwordCheck;

		if ($checksPassed) {
			return redirect(route('kield01.mdp.dashboard.index'));
		}

		return redirect()
			->back()
			->with($credentials);
	}

	public function register()
	{
		return view('mdp::pages.user.register');
	}

	public function store(Request $request)
	{
	}
}
