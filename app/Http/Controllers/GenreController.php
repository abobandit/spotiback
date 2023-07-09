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
	try{

	}catch(\PDOException $e){
	    return response()->json([
	            'status' => false,
	            'error' => $e
    	    ],400);
	}
		$genre = Genre::create( $request->validated() );

		return $genre;
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Genre $genre ) {
		return response()->json([
		'genre'=>$genre->genre,
		'mood'=>$genre->mood,
		]);

	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, Genre $genre ) {

		$genre->update( [
		'genre' => $request->all()['genre'],
		'mood' => $request->all()['mood']
		]);
		return response()->json( [ 'message' => 'genre successfully updated', 'genre' => $genre ] );
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( Genre $genre ) {
		$genre->delete();

		return response()->json( [ 'message' => 'genre successfully deleted' ], 201 );
	}
}
