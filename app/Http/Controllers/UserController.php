<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	    $validator = Validator::make( $request->all(), [
		    'first_name' => 'required',
		    'last_name'  => 'required',
		    'birthday' => 'nullable',
			'login' => 'required',
		    'gender' => 'nullable',
		    'img_url' => 'nullable',
		    'email'      => 'required|email|unique:users,email',
		    'password'   => 'required',
	    ] );
	    if ( $validator->fails() ) {
		    return response()->json( [
			    'errors' => $validator->errors()
		    ], 422 );
	    }
	    $user = User::create( $validator->validated() );

	    return response()->json( [ 'message' => 'user created' ], 200 );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return User::find($user);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,Request $request)
    {
	    $user->update($request->all());
		return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
		return response()->json(['message' => 'user successfully deleted'],201);
    }
}
