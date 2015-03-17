<?php namespace App\Services;

use App\OAuthIdentity;
use App\User;

use Auth;
use Closure;

class SocialRegistrar {

	public function login($provider, $details)
	{
		$user = $this->getUser($provider, $details);

		$user = $this->bindUserData($user, $details);

		$this->updateUser($user, $provider, $details);

		Auth::login($user);
	}

	protected function getUser($provider, $details)
	{
		$identity = OAuthIdentity::forProvider($provider, $details->id)->first();

		if($identity !== null)
		{
			return $identity->user()->first();
		}

		if($details->email !== null)
		{
			$user = User::whereEmail($email)->first();

			if($user !== null)
			{
				return $user;
			}
		}

		return new User;
	}

	protected function bindUserdata($user, $details)
	{
		if($user->name === null && $this->getNameForUser($details) !== null)
		{
			$user->name = $this->getNameForUser($details);
		}

		if($user->email === null && $details->email !== null)
		{
			$user->email = $details->email;
		}

		if($user->avatar === null && $details->avatar !== null)
		{
			$user->avatar = $details->avatar;
		}

		return $user;
	}

	protected function getNameForUser($details)
	{
		return $details->nickname ?: $details->name;
	}

	protected function updateUser($user, $provider, $details)
	{
		$user->save();

		$this->updateAccessToken($user, $provider, $details);
	}

	protected function updateAccessToken($user, $provider, $details)
	{
		OAuthIdentity::where('user_id', $user->getKey())
				->where('provider', $provider)->delete();

		$this->addAccessToken($user, $provider, $details);
	}

	protected function addAccessToken($user, $provider, $details)
    {
		$identity = new OAuthIdentity;
		$identity->user_id = $user->getKey();
		$identity->provider = $provider;
		$identity->provider_user_id = $details->id;
		$identity->access_token = $details->token;

		$identity->save();
    }

}