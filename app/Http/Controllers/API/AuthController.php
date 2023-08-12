<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\Rule;
use App\Models\Role;

class AuthController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth:api', [ 'except' => [ 'login', 'register' ] ] );
    }

    public function sendResponse( $data, $message, $status = 200 ) {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json( $response, $status );
    }

    public function sendError( $errorData, $message, $status = 500 ) {
        $response = [];
        $response[ 'message' ] = $message;
        if ( !empty( $errorData ) ) {
            $response[ 'data' ] = $errorData;
        }

        return response()->json( $response, $status );
    }

    public function register( Request $request ) {
        $input = $request->only( 'first_name', 'last_name', 'email', 'password', 'c_password', 'role_id', 'address', 'phone_number' );

        $validator = Validator::make( $input, [
            'first_name' => [ 'required', 'string', 'max:255' ],
            'last_name' => [ 'required', 'string', 'max:255' ],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
            'address'=>[ 'required', 'string', 'max:150' ],
            'phone_number'=>'required|min:11|numeric',
            'role_id' => [ 'required', Rule::in( Role::ROLE_OWNER, Rolحاحe::ROLE_USER ) ],
        ] );

        if ( $validator->fails() ) {
            return $this->sendError( $validator->errors(), 'Validation Error', 422 );
        }

        $input[ 'password' ] = bcrypt( $input[ 'password' ] );
        $input[ 'role_id' ] = 3;
        // use bcrypt to hash the passwords
        $user = User::create( $input );
        // eloquent creation of data

        $success[ 'user' ] = $user;

        return $this->sendResponse( $success, 'user registered successfully', 201 );

    }

    public function login( Request $request ) {
        $input = $request->only( 'email', 'password' );

        $validator = Validator::make( $input, [
            'email' => 'required',
            'password' => 'required',
        ] );

        if ( $validator->fails() ) {
            return $this->sendError( $validator->errors(), 'Validation Error', 422 );
        }

        try {
            // this authenticates the user details with the database and generates a token
            if ( ! $token = JWTAuth::attempt( $input ) ) {
                return $this->sendError( [], 'invalid login credentials', 400 );
            }
        } catch ( JWTException $e ) {
            return $this->sendError( [], $e->getMessage(), 500 );
        }

        $success = [
            'token' => $token,
            'user'=>Auth::user(),
        ];
        return $this->sendResponse( $success, 'successful login', 200 );
    }

    public function getUser() {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if ( !$user ) {
                return $this->sendError( [], 'user not found', 403 );
            }

        } catch ( JWTException $e ) {
            return $this->sendError( [], $e->getMessage(), 500 );
        }

        return $this->sendResponse( $user, 'user data retrieved', 200 );
    }

    /**
    * Log the user out ( Invalidate the token ).
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function logout() {
        auth()->logout();
        return response()->json( [ 'message' => 'User successfully signed out' ] );
    }
    /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function refresh() {
        return $this->createNewToken( auth()->refresh() );
    }
    /**
    * Get the authenticated User.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function userProfile() {
        return response()->json( auth()->user() );
    }
    /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
    protected function createNewToken( $token ) {
        return response()->json( [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ] );
    }
}
