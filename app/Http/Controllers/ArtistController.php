<?php

namespace App\Http\Controllers;
use App\Http\Resources\ArtistResource;
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
        return ArtistResource::collection(Artist::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistRequest $request)
    {

	    $currentPlaylist = Artist::create( $request->validated() );

	    return response()->json( [ 'message' => 'Artist created' ],201 );
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return new ArtistResource($artist);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $currentPlaylist)
    {
        $currentPlaylist->update($request->all());
		return $currentPlaylist;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $currentPlaylist)
    {
        $currentPlaylist->delete();
	    return response()->json(['message' => 'currentPlaylist successfully deleted'],201);
    }
}
