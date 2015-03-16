<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OAuthIdentity extends Model {

	protected $table = "oauth_identities";

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
