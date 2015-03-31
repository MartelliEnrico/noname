<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['body'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function song()
	{
		return $this->belongsTo('App\Song');
	}

	public function likes()
	{
		return $this->morphMany('App\Like', 'likeable');
	}

}
