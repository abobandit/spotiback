<?php

namespace App\Http\Controllers;
use App\Http\Requests\PlaylistRequest;
use App\Http\Resources\PlaylistResource;
use App\Models\Album;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return PlaylistResource::collection( Playlist::all()->where( 'user_id', Auth::user()->id ) );
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(PlaylistRequest $request) {
		return  Playlist::create( [
			'title'   => $request->title,
			'user_id' => Auth::user()->id
		],201 );
	}

	/**
	 * Display the specified resource.
	 */
	public function show( Playlist $playlist ) {
		return new PlaylistResource($playlist);
	}
	/**
	 * Update the specified resource in storage.
	 */
	public function update( PlaylistRequest $request, Playlist $playlist ) {
	if(Auth::user()->role==='admin') {
            $playlist->update( [ 'title' => $request->title ] );
            return response()->json( [ 'message' => 'Playlist title successfully updated' ],201 );
            }
		try {
			if ( $playlist->checkCurrentUser( $playlist->user_id ) || ! $playlist->title === 'Любимые треки' ) {
				$playlist->update( [ 'title' => $request->title ] );

				return response()->json( [ 'message' => 'Playlist title successfully updated' ],201 );
			} else {
				return response()->json( [ 'status' => false, 'message' => 'Can not update this playlist' ], 404 );

			}

		} catch ( \Error $exception ) {
			return response()->json( [
				'status'  => false,
				'message' => 'Failed to delete',
				'error'   => $exception
			], 500 );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( Playlist $playlist ) {
        if(Auth::user()->role==='admin') {
        $playlist->delete();
        return response()->json( [ 'message' => 'Playlist successfully deleted' ],201 );
        }else{
        try {
              			if ( $playlist->checkCurrentUser( $playlist->user_id ) || ! $playlist->title === 'Любимые треки' ) {
              				$playlist->delete();

              				return response()->json( [ 'message' => 'Playlist successfully deleted' ] ,201);
              			} else {
              				return response()->json( [ 'status' => false, 'message' => 'Can not delete this playlist' ], 404 );

              			}

              		} catch ( \Error $exception ) {
              			return response()->json( [
              				'status'  => false,
              				'message' => 'Failed to delete',
              				'error'   => $exception
              			], 500 );
              		}
        }

	}

	public function addToPlaylist( Request $request, Playlist $playlist ) {
		try {
			if ( $playlist->checkCurrentUser( $playlist->user_id ) ) {
				$playlist_found = Playlist::find( $playlist->id );
				$track_found    = Track::find( $request->track_id );
				$album_found = Album::find($track_found->album_id);
				$playlist->tracks()->attach($track_found);
				return response()->json( [
					'playlist' => $playlist_found->title,
					'playlist_id' => $playlist_found->id,
					'track'    => $track_found->title,
					'track_id'    => $track_found->id,
					'album'    => $album_found->title
				] );
			} else {
				return response()->json( [
					'status'  => false,
					'message' => 'Can not add this track to playlist'
				], 403 );
			}
		} catch (\PDOException $exception ) {
			return [ 'status' => false, 'message' => $exception ];
		}
	}
}
