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
		if ($user = $this->getExistingUser($provider, $details)) {
            return $user;
        }

        return new User;
	}

	protected function getExistingUser($provider, $details)
	{
		return OAuthIdentity::whereProvider($provider)
				->whereProviderUserId($details->id)->first()
				->user()->first();
	}

	protected function bindUserdata($user, $details)
	{
		$user->name = $details->nickname ?: $details->name;
		$user->email = $details->email;
		$user->avatar = $details->avatar;

		return $user;
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