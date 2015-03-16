<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Socialize;

class SocialController extends Controller {

	public function redirectToProvider($provider)
	{
		return Socialize::with($provider)->redirect();
	}

	public function handleProviderCallback($provider)
	{
		$user = Socialize::with($provider)->user();

		// TODO: do some stuff with the user

		return redirect('/');
	}

}
