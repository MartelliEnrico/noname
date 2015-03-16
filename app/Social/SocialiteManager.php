<?php namespace App\Social;

use Laravel\Socialite\SocialiteManager;

class SocialiteManager extends Manager {

	public function createSoundcloudDriver()
	{
		$config = $this->app['config']['services.soundcloud'];

		return $this->buildProvider(
			'App\Social\SoundcloudProvider', $config
		);
	}

}