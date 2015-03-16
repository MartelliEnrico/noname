<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\SocialRegistrar;

use Illuminate\Http\Request;
use Socialize;

class SocialController extends Controller {

	public function redirectToProvider($provider)
	{
		return Socialize::with($provider)->redirect();
	}

	public function handleProviderCallback($provider, SocialRegistrar $registrar)
	{
		$user = Socialize::with($provider)->user();

		$registrar->login($provider, $user);

		return redirect('/');
	}

}
