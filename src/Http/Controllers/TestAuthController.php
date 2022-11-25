<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class TestAuthController extends Controller
{
    public function login(): string
    {
        return view('mdp::pages.user.login')->render();
    }

    public function auth(Request $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ];

        $emailCheck = Str::is('john.doe@example.com', $credentials['email']);
        $passwordCheck = Str::is('adminTest!123', $credentials['password']);
        $checksPassed = $emailCheck && $passwordCheck;

        if ($checksPassed) {
            return redirect(route('kield01.mdp.dashboard.index'));
        }

        return redirect()
            ->back()
            ->with($credentials);
    }

    public function register(): string
    {
        return view('mdp::pages.user.register')->render();
    }
}
