<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use function inclued\sendError;
use function inclued\sendResponse;

class ResetPasswordController extends Controller {
    public function resetPassword( Request $request ) {
        $request->validate( [
            'email' => 'required|email'
        ] );
        $email = $request->email;
        $token = rand( 111111, 999999 );
        //generate token
        if ( count( $user = User::where( 'email', $email )->get() ) > 0 ) {
            if ( count( $r_password = DB::table( 'password_resets' )->where( 'email', $email )->get() )>0 ) {
                $r_password->token = DB::table( 'password_resets' )->where( 'email', $email )->update( [
                    'token' => $token,
                ] );
                $mail = Mail::to( $email )->send( new UserMail( [
                    'password' => $token,
                ] ) );
                return sendResponse( '', 'new password has sent' );
            }
            $insert = DB::table( 'password_resets' )->insert( [
                'email' => $email,
                'token' => $token
            ] );
            $mail = Mail::to( $email )->send( new UserMail( [
                'password' => $token,
            ] ) );

            if ( $mail ) {
                return sendResponse( '', 'new email has sent' );
            }
            return sendError( '', 'something goes wrong' );
        }
        return sendError( '', 'please enter valid email' );
    }

    public function checkToken( Request $request ) {
        $user = DB::table( 'password_resets' )->where( 'token', $request->token )->get();
        if ( count( $user )>0 ) {
            return sendResponse( $user, 'success' );
        }
        return sendError( '', 'please enter valid pin' );
    }

    public function updatePassword( Request $request )
 {
        $request->validate( [
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ] );
        $db = DB::table( 'password_resets' )->where( [
            'email' => $request->email,
            'token' => $request->token,
        ] )->get();
        if ( count( $db ) > 0 ) {
            $user = User::where( 'email', $request->email )->update( [
                'password' => bcrypt( $request->password ),
            ] );
            return sendResponse( '', 'new password has updated' );
        }
        return sendError( '', 'please enter valid data' );
    }
}
