<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Playlist;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return ( User::all() );
	}

	/**
	 * Store a newly created resource in storage.
	 */
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/login';

	public function store( UserRequest $request ) {
		try {
		if($request->validated( 'role' ) != null){

		if ( Auth::user()->role !== 'admin') {
        				return response()->json( [
        					'status'  => false,
        					'message' => 'establishing a role cannot be done'
        				], 500 );
        			}
		}
            $validated = $request->validated();
			$user = User::create( $validated );
                  				if ($user){
                  					$playlist = Playlist::create( [
                  						'user_id' => $user['id'],
                  						'title'   => 'Любимые треки',
                  					] );
                  				}
                  			return response()->json( [
                  			        'status' => 'Created',
                  					'user'     => $user
                  				], 201 );


		} catch ( \Throwable $th ) {
			return response()->json( [
				'status'  => false,
				'message' => $th->getMessage()
			], 400 );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( User $user ) {
		$findUser = User::find( $user );

		return $findUser;
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( User $user, UserRequest $request ) {
		$user->update( $request->all() );

		return $user;
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( User $user ) {
		$user->delete();

		return response()->json( [ 'message' => 'user successfully deleted' ], 201 );
	}
	public function login( Request $request, User $user ) {
		try {
			$validateUser = Validator::make( $request->all(), [
				'email'    => 'required',
				'password' => 'required'
			] );
			if ( $validateUser->fails() ) {
				return response()->json( [
					'status'  => false,
					'message' => 'validation error',
					'errors'  => $validateUser->errors()
				],400 );
			}
		} catch ( \Throwable $th ) {
			return response()->json( [ 'message' => $th->getMessage() ] );
		}
		if ( Auth::attempt( $request->only( [ 'email', 'password' ] ) ) ) {
			$user = Auth::user();
			Auth::user()->tokens()->delete();
//			Auth::user()->role = User::where( 'email', $request->email )->get( 'role' );
			$token             = Auth::user()->createToken( 'api' )->plainTextToken;

			return response()->json( [
				'status'  => true,
				'role' => Auth::user()->role,
				'message' => 'User Logged in successfully',
				'token'   => $token
			], 200 );
		} else {
			return response()->json( [
			'status' => false,
				'message' => 'Hey buddy, i think you got the wrong door the leather club is 2 blocks down'
			] );
		}
	}
}
