<?php

use Illuminate\Support\Facades\Route;
use KielD01\LaravelMaterialDashboardPro\Http\Controllers\TestAuthController;

Route::name('kield01.mdp.')
	->group(
		static function () {
			Route::any('login', [TestAuthController::class, 'login'])->name('user.login');
			Route::any('sign-up', [TestAuthController::class, 'register'])->name('user.register');
		}
	);
