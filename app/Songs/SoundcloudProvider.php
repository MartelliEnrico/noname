<?php namespace App\Songs;

class SoundcloudProvider implements MediaProvider {

	public function getSimpleName()
	{
		return 'soundcloud';
	}

	public function urlMatch($url)
	{
		$rule = '/^http:\/\/w.soundcloud\.com\/.*%2Ftracks%2F([0-9A-F]+)$/';

		return preg_match($rule, $url);
	}

}