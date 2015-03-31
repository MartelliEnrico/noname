<?php namespace App\Songs;

class VimeoProvider implements MediaProvider {

	public function getSimpleName()
	{
		return 'vimeo';
	}

	public function urlMatch($url)
	{
		$rule = '/^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)$/';

		return preg_match($rule, $url);
	}

}