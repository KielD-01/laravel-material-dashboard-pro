<?php

declare(strict_types=1);

namespace KielD01\LaravelMaterialDashboardPro\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;

class CacheAuth implements UserProvider
{
	public function retrieveById($identifier)
	{
		// TODO: Implement retrieveById() method.
	}

	public function retrieveByCredentials(array $credentials)
	{
		// TODO: Implement retrieveByCredentials() method.
	}

	public function validateCredentials(Authenticatable $user, array $credentials)
	{
		// TODO: Implement validateCredentials() method.
	}

	public function retrieveByToken($identifier, $token)
	{
		// TODO: Implement retrieveByToken() method.
	}

	public function updateRememberToken(Authenticatable $user, $token)
	{
		// TODO: Implement updateRememberToken() method.
	}
}
