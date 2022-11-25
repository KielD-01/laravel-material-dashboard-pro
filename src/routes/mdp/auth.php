<?php

use Illuminate\Support\Facades\Route;
use KielD01\LaravelMaterialDashboardPro\Http\Controllers\TestAuthController;

Route::name('kield01.mdp.')
	->prefix('mdp')
	->group(
		static function () {
			Route::get('login', [TestAuthController::class, 'login'])->name('user.login');
			Route::post('login', [TestAuthController::class, 'auth'])->name('user.auth');

			Route::get('sign-up', [TestAuthController::class, 'register'])->name('user.register');
			Route::post('sign-up', [TestAuthController::class, 'store'])->name('user.sign_up');
		}
	);
