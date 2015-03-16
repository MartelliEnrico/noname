<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['url'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function likes()
	{
		return $this->morphMany('App\Like', 'likeable');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function playlists()
	{
		return $this->belongsToMany('App\Playlist');
	}

}
