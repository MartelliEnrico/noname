<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OAuthIdentity extends Model {

	protected $table = "oauth_identities";

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeForProvider($query, $provider, $providerUserId)
	{
		return $query->whereProvider($provider)->whereProviderUserId($providerUserId);
	}

	public function scopeForUser($query, $provider, $userId)
	{
		return $query->whereProvider($provider)->whereUserId($userId);
	}

}
