<?php namespace App\Songs;

interface MediaProvider {

	public function urlMatch($url);

	public function getSimpleName();

}