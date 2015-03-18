<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VideoController extends Controller {

	public function create()
	{
		return view('video.create');
	}

	public function store(){
		$input = Request::all();

		Video::create($input);

		return redirect('welcome');
	}


}
