<?php namespace App\Songs;

class YoutubeProvider implements MediaProvider {

	public function getSimpleName()
	{
		return 'youtube';
	}

	public function urlMatch($url)
	{
		$rule = '/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/';

		return preg_match($rule, $url);
	}

}