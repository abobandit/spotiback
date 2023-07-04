<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Artist::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistRequest $request)
    {

	    $artist = Artist::create( $request->validated() );

	    return response()->json( [ 'message' => 'artist created' ], 200 );
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return Artist::find($artist);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->update($request->all());
		return $artist;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
	    return response()->json(['message' => 'artist successfully deleted'],201);
    }
}
