<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\Rule;
use App\Models\Role;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;
use function inclued\sendError;
use function inclued\sendResponse;

class AuthController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth:api', [ 'except' => [ 'login', 'register','update' ] ] );
    }


    public function register( Request $request ) {

        $input = $request->only( 'first_name', 'last_name', 'email', 'password', 'c_password', 'role_id', 'address', 'phone_number' );
        $credentials =['email'=>$input['email'] , 'password'=>$input['password']];
        $validator = Validator::make( $input, [
            'first_name' => [ 'required', 'string', 'max:255' ],
            'last_name' => [ 'required', 'string', 'max:255' ],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
//            'address'=>[ 'required', 'string', 'max:150' ],
            'phone_number'=>'required|min:11|numeric',
//            'role_id' => [ 'required', Rule::in( Role::ROLE_OWNER, Role::ROLE_USER ) ],
        ] );

        if ( $validator->fails() ) {
            return sendError( $validator->errors(), 'Validation Error', 422 );
        }

        $input[ 'password' ] = bcrypt( $input[ 'password' ] );
        $input[ 'role_id' ] = 3;
        // use bcrypt to hash the passwords
        $user = User::create( $input );
        // eloquent creation of data

        $success[ 'user' ] = $user;
        $success['token']  = JWTAuth::attempt($credentials);
//        $success['mail'] = Mail::send(view('auth.verify-email'),['sdsdgsd'],function ($message) use ($input){
//            $message->to($input['email'],'fffffff');
//        });
        return sendResponse( $success, 'user registered successfully', 201 );

    }

    public function login( Request $request ) {
        $input = $request->only( 'email', 'password' );

        $validator = Validator::make( $input, [
            'email' => 'required',
            'password' => 'required',
        ] );

        if ( $validator->fails() ) {
            return sendError( $validator->errors(), 'Validation Error', 422 );
        }

        try {
            // this authenticates the user details with the database and generates a token
            if ( ! $token = JWTAuth::attempt( $input ) ) {
                return sendError( [], 'invalid login credentials', 400 );
            }
        } catch ( JWTException $e ) {
            return sendError( [], $e->getMessage(), 500 );
        }

        $success = [
            'token' => $token,
            'user'=>Auth::user(),
        ];
        return sendResponse( $success, 'successful login', 200 );
    }

    public function getUser() {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if ( !$user ) {
                return sendError( [], 'user not found', 403 );
            }

        } catch ( JWTException $e ) {
            return sendError( [], $e->getMessage(), 500 );
        }

        return sendResponse( $user, 'user data retrieved', 200 );
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

    public function update(Request $request)
    {
//        $request->validate([
//            'first_name' => [ 'required', 'string', 'max:255' ],
//            'last_name' => [ 'required', 'string', 'max:255' ],
//            'password' => 'required|min:8',
//            'password_confirmation' => 'required|same:password',
//            'phone_number'=>'required|min:11|numeric',
//        ]);
        $user = JWTAuth::parseToken()->authenticate();
        $profile =$user->profile_picture ;
        if($request->profile_picture ){
            $profile =  $request->profile_picture->store('image/them','public_path');
        }
        // $user = JWTAuth::parseToken()->authenticate();
        // dd($user);
        $password = isset($request->password) ? bcrypt($request->password) : $user->password;
        $update = User::find($user->id)->update([
            'first_name' => isset($request->first_name) ? $request->first_name : $user->first_name,
            'last_name' => isset($request->last_name) ? $request->last_name : $user->last_name,
            'phone_number' => isset($request->phone_number) ? $request->phone_number : $user->phone_number,
            'email' => isset($request->email ) ? $request->email  : $user->email,
            'address' => isset($request->address) ? $request->address : $user->address,
            'profile_picture' =>  isset($request->profile_picture) ? $profile : $user->profile_picture,
            'role_id'=>3,
            'gender' => $request->gender,
            'password' => isset($request->password) ? $password : $user->password,

        ]);

        if ($update){
            return sendResponse($update,'User Data Updated Successfully');
        }
    }



}
