<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\PropertyOwnerRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
 {

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function showLogin()
 {
        return view( 'auth.login' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function login( LoginRequest $request )
 {
        $request->validate( [
            'email' => 'required',
            'password' => 'required',
        ] );
        $user = User::where( 'email', '=', $request->email )
        ->first();
        if ( $user && $user->role_id == 3 && $user->status == 'active' ) {

            return redirect()->back()->with( 'err', 'Not Allowed Login By this User' );

        }
        $credentials = [ 'email'=>$request->email, 'password'=>$request->password ];
        if ( Auth::guard( 'admin' )->attempt( $credentials ) ) {
            return redirect()->route( 'dashboard' );
        }
        return redirect()->back()->with( 'err', 'please enter valid data' );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function create()
 {
        return view( 'auth.register' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */

    public function store( RegisterRequest $request )
 {
        $user = User::create( [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'role_id'=>1,
        ] );

        if ( $user ) {
            return redirect()->route( 'login' );
        }
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function edit( $id )
 {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function update( $id )
 {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function logout()
 {
        //     dd( Auth::user() );
        Auth::logout();
        return redirect( 'login' );
    }

}

?>
