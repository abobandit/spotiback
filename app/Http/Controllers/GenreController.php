<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return GenreResource::collection( Genre::all() );
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( GenreRequest $request ) {
		$genre = Genre::create( $request->all() );
		if ( $genre->fails() ) {
			return response()->json( [
				'errors' => $genre->errors()
			], 422 );
		}

		return $genre;
	}

	/**
	 * Display the specified resource.
	 */
	public function show( Genre $genre ) {
		return response()->json( [
			'id'   => $genre->id,
			'name' => $genre->name,
		] );

	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update( GenreRequest $request, Genre $genre ) {

		$genre->update( ['name' => $request->all()['name']]);
		return response()->json( [ 'message' => 'genre name successfully updated', 'genre' => $genre ] );
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( Genre $genre ) {
		$genre->delete();

		return response()->json( [ 'message' => 'genre successfully deleted' ], 201 );
	}
}
