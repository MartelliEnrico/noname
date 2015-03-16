<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function videos()
	{
		return $this->hasMany('App\Video');
	}

	public function playlists()
	{
		return $this->hasMany('App\Playlist');
	}

	public function likes()
	{
		return $this->hasMany('App\Like');
	}

	public function views()
	{
		return $this->hasMany('App\View');
	}

}
