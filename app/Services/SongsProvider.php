<?php namespace App\Services;

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

			if($provider->urlMatch($songUrl))
			{
				return $provider->getSimpleName();
			}
		}

		return null;
	}

}