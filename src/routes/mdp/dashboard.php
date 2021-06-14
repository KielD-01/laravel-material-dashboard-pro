<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use KielD01\LaravelMaterialDashboardPro\Http\Controllers\TestDashboardController;

Route::name('kield01.mdp.dashboard')
	->prefix('mdp')
	->group(
		static function () {
			Route::prefix('dashboard')
				->group(
					static function () {
						Route::any('login', [TestDashboardController::class, 'index'])->name('index');
					}
				);
		}
	);
