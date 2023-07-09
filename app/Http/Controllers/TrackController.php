<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Http\Resources\TrackResource;
use App\Models\Track;
use Illuminate\Http\Request;
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
		$album->delete();

        		return response()->json( [ 'message' => 'track successfully deleted' ], 201 );
	}
}
