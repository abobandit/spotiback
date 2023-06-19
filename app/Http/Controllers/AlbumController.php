<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Album::all();
    }


    public function store(Request $request)
    {
	    $album = Album::create($request->all());
	    return $album;
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return Album::find($album);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $album->update($request->all());
		return $album;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
	    $album -> delete();
	    return response()->json(['message' => 'album successfully deleted'],201);
    }
}
