<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;

class SocialAuth extends Controller {
    //
    protected function validateProvider( $provider ) {
        if ( !in_array( $provider, [ 'facebook', 'github', 'google' ] ) ) {
            return response()->json( [ 'error' => 'Please login using facebook, github or google' ], 422 );
        }
    }

    public function redirectToProvider( $provider ) {
        $validated = $this->validateProvider( $provider );
        if ( !is_null( $validated ) ) {
            return $validated;
        }

        return Socialite::driver( $provider )->stateless()->redirect();
    }

    public function handleProviderCallback( $provider ) {
        $validated = $this->validateProvider( $provider );
        if ( !is_null( $validated ) ) {
            return $validated;
        }
        // $user = Socialite::driver( $provider )->stateless()->user();
        // dd( $user );
        try {
            $user = Socialite::driver( $provider )->stateless()->user();
        } catch ( ClientException $exception ) {
            return response()->json( [ 'error' => 'Invalid credentials provided.' ], 422 );
        }
        $random_password = rand( 111111, 999999 );
        //generate token
        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'first_name' => $user->getName(),
                'last_name' => $user->getName(),
                'status' => 'active',
                'password'=>$random_password,
                'role_id'  => 3,
            ]
        );
        $userCreated->providers()->updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ],
            [
                'avatar' => $user->getAvatar()
            ]
        );
        $token = JWTAuth::fromUser( $userCreated );

        return response()->json( $userCreated, 200, [ 'Access-Token' => $token ] );
    }

}
