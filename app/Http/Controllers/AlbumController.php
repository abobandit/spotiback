<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class AlbumController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return AlbumResource::collection(Album::all());
	}


	public function store( AlbumRequest $request) {
		try {
			$filename = $request->file('og_image')->store('/');

			$album_create =  Album::create([
				                               'og_image' => $filename
			                               ] + $request->validated() );
			$artist = Artist::find($request->artist_id);
			$album_create->artists()->attach($artist);
			return response()->json([
				'album' => $album_create,
				'artist' => $artist,
			]);
		}catch (\PDOException $exception){
			return $exception;
		}

	}

	/**
	 * Display the specified resource.
	 */
	public function show( Album $album ) {
		return new AlbumResource( $album );
	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, Album $album ) {
		$album->update( $request->all() );

		return $album;
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( Album $album ) {
		$album->delete();

		return response()->json( [ 'message' => 'album successfully deleted' ], 201 );
	}
}
