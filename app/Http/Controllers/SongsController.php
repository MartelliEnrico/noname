<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Song;
use App\Services\SongsProvider;

use Illuminate\Http\Request;

class SongsController extends Controller {

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

		$provider = $songs->getProviderFromUrl($request->get('url'));

		if($provider === null)
		{
			throw \Exception('TODO');
		}

		$song = Song::create([
			'url' => $request->get('url')
		]);

		$song->provider = $provider;
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
