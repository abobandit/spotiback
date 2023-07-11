<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Http\Resources\TrackResource;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

class TrackController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return TrackResource::collection(Track::all());
	}

	public function store( TrackRequest $request ) {

			$filename  = $request->file( 'storage_dir' )->store( '', 'public' );
			$track     = Track::create( [
				                            'storage_dir' => $filename
			                            ] + $request->validated() );

		return $track;
	}

	/**
	 * Display the specified resource.
	 */
	public function show( Track $track ) {
		return new TrackResource($track);
	}
	public function searchPlaylistsByTrackId($trackId)
	{
		$user = Auth::user(); // Получаем текущего пользователя
		// Ищем трек по track_id
		$track = Track::where('id', $trackId)->first();
		if ($track) {
			// Ищем плейлисты текущего пользователя, где этот трек присутствует
			$playlists = $user->playlists()->whereHas('tracks', function ($query) use ($trackId) {
				$query->where('track_id', $trackId);
			})->get();

			// Возвращаем массив плейлистов
			return response()->json(['playlists' => $playlists], 200);
		}

		// Если трек не найден, возвращаем ошибку
		return response()->json(['error' => 'Track not found'], 404);
	}
	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, Track $track ) {
		$track->update( $request->all() );

        		return response()->json(['message' => 'track successfully updated',
        		$track],201);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( Track $track ) {
		$track->delete();

        		return response()->json( [ 'message' => 'track successfully deleted' ], 201 );
	}
}
