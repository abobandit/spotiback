<?php

use App\Http\Controllers\AlbumController as AlbumController;
use App\Http\Controllers\ArtistController as ArtistController;
use App\Http\Controllers\GenreController as GenreController;
use App\Http\Controllers\PlaylistController as PlaylistController;
use App\Http\Controllers\TrackController as TrackController;
use App\Http\Controllers\UserController as UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post( '/signin', [ UserController::class, 'store' ] );
Route::post( '/login', [ UserController::class, 'login' ] );



Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource( '/playlists', PlaylistController::class );
	Route::post( '/addToPlaylist/{playlist}', [ PlaylistController::class, 'addToPlaylist' ] );
	Route::apiResource( '/albums', AlbumController::class )->only( [ 'show', 'index' ] );
	Route::apiResource( '/tracks', TrackController::class )->only( [ 'show', 'index' ] );
	Route::apiResource( '/artists', ArtistController::class )->only( [ 'show', 'index' ] );

});
Route::middleware( [ 'auth:sanctum', 'admin' ] )->prefix( '/admin' )->group( function () {
	Route::apiResource( '/users', UserController::class );
	Route::apiResource( '/artists', ArtistController::class );
	Route::apiResource( '/genres', GenreController::class );
	Route::apiResource( '/albums', AlbumController::class );
	Route::apiResource( '/tracks', TrackController::class );
} );
