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

	public function identities()
	{
		return $this->hasMany('App\OAuthIdentity');
	}

	public function setNameAttribute($name)
	{
		$name = str_replace(" ", "", $name);

		$list = $this->newQuery()->where('name', 'LIKE', "$name%")->lists('name', 'id');

		if(! $this->nameIsUnique($list, $name))
		{
			$name = $this->getUniqueName($list, $name);
		}

		$this->attributes['name'] = $name;
	}

	protected function nameIsUnique($list, $name)
	{
		return count($list) === 0
				|| ! in_array($name, $list)
				|| (array_key_exists('id', $list) && $list['id'] === $name);
	}

	protected function getUniqueName($list, $name)
	{
		$length = strlen("$name.");

		array_walk($list, function(&$value, $key) use ($length)
		{
			$value = intval(substr($value, $length));
		});

		rsort($list);

		$increment = reset($list) + 1;

		return "$name.$increment";
	}

}
