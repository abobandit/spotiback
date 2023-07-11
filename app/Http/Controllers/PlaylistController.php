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
		$r = new PlaylistResource($playlist);
		return $r ;
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
	public function checkTrackInPlaylist( $track_id, $searchLoved,$playlist_id ='Любимые треки')
    {
        // Получение пользователя по его id


        // Получение плейлиста пользователя по названию
        if($searchLoved === 'true'){
          $playlist = Auth::user()->playlists()->where('title',$playlist_id)->first();

        }else{
            $playlist = Auth::user()->playlists()->where('id',$playlist_id)->first();
        }
        if (!$playlist) {
            // Плейлист не найден
            return response()->json([

                                    'status' => false,
                                    'message' => 'Плейлист не найден'
                                ],400);
        }
        // Проверка наличия трека в плейлисте
        $track = Track::find($track_id);
        if (!$track) {
            // Трек не найден
            return response()->json([
                        'status' => false,
                        'message' => 'Трек не найден'
                    ],400);
        }

        // Проверка связи трека с плейлистом
        $isInPlaylist = $playlist->tracks()
            ->where('track_id', $track_id)
            ->exists();
            if($isInPlaylist){
            return response()->json([
                    'tracks' =>$playlist->tracks,
                    'track' =>$track,
                    'track-finde' =>$track_id,
                    'playlist' =>$playlist->id,
                    'status' => true,
                    'message' => 'уже в плейлисте'
                    ],200);
            }
        else{
        return response()->json([
                                'status' => false,
                                'message' => 'Не в плейлисте'
                            ],200);
        }
    }
	public function addTrack(Request $request)
    {
        $track = $request->track_id;
        $playlistName = 'Любимые треки';

        // Получение id авторизованного пользователя
        $userId = Auth::id();

        // Находим плейлист в базе данных по названию и id пользователя
        $playlist = Playlist::where([
            ['title', $playlistName],
            ['user_id', $userId]
        ])->first();

        if ($playlist) {
            // Плейлист найден, добавляем трек в плейлист
            $playlist->tracks()->attach( $track);

            return response()->json(['message' => 'Трек успешно добавлен в плейлист!']);
        } else {
            // Плейлист не найден, выполняем соответствующие действия
            return response()->json(['message' => 'Плейлист не найден!']);
        }
    }
    public function removeFromPlaylist($playlist_id,$track_id)
    {

        // Находим плейлист и трек в базе данных
        $playlist = Playlist::find($playlist_id);
        $track = Track::find($track_id);

        if ($playlist && $track) {
            // Удаляем запись из связующей таблицы
            $playlist->tracks()->detach($track_id);

            return response()->json(['message' => 'Запись успешно удалена из плейлиста!']);
        } else {
            // Плейлист или трек не найдены, выполняем соответствующие действия
            return response()->json(['message' => 'Плейлист или трек не найдены!'], 404);
        }
    }
}
