<?php namespace App\Services;

use InvalidArgumentException;

class SongsProvider {

	protected $providers = [
		'App\Songs\YoutubeProvider',
		'App\Songs\VimeoProvider',
		'App\Songs\SoundcloudProvider'
	];

	public function getProviderFromUrl($songUrl)
	{
		foreach ($this->providers as $name) {
			$provider = app($name);

			if($provider->urlMatch(trim($songUrl)))
			{
				return $provider->getSimpleName();
			}
		}

		throw new InvalidArgumentException("The url is not supported.");
	}

}