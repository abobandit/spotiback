<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Solutions\GenerateAppKeySolution;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Genre::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
		return $genre;
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return Genre::find($genre);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $genre->update($request->all());
		return $genre;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre -> delete();
	    return response()->json(['message' => 'genre successfully deleted'],201);
    }
}
