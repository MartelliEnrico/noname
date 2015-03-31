<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model {

	public function song()
	{
		return $this->belongsTo('App\Song');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
