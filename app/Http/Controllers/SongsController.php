<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Song;
use App\Services\SongsProvider;

use Illuminate\Http\Request;

use Auth;

class SongsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$songs = Song::latest()->paginate(25);

		return view('songs.index', compact('songs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, SongsProvider $songs)
	{
		$this->validate($request, [
			'url' => 'required|string'
		]);

		$url = $request->get('url');
		$provider = $songs->getProviderFromUrl($url);

		$song = new Song;
		$song->url = $url;
		$song->source = $provider;
		$song->user_id = Auth::id();
		$song->save();

		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
