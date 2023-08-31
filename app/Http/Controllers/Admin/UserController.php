<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminEditRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneralTrait;

class UserController extends Controller {
    use GeneralTrait;

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function index() {
        $users = User::where( 'role_id', 1 )->latest()->get();
        return view( 'admin.superadmin.index', compact( 'users' ) );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function create() {
        return view( 'admin.superadmin.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */

    public function store( RegisterRequest $request ) {
        $user = User::create( [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>bcrypt( $request->password ),
            'role_id'=>1,
        ] );

        if ( $user ) {
            return redirect()->route( 'admin.index' );
        }

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function show( $id ) {
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function edit( $id ) {
        //      dd( $user );
        $user = User::findOrFail( $id );
        return view( 'admin.superadmin.edit', compact( 'user' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function update( AdminEditRequest $request, $id ) {
        //      dd( $request->all() );
        //      $request->validate( [
        //         'email'=>'required|unique:users,email,'.$id,
        // ] );
        $user = User::findOrFail( $id );
        $password = $request->password ? bcrypt( $request->password ):$user->password;
        $user->update( [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>$password,
        ] );

        return redirect()->route( 'admin.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function destroy( $id ) {
        $user = User::find( $id );
        $user->delete();
        return redirect()->back();
    }

    public function Adminprofile() {
        $id = Auth::user()->id;
        $profileData = User::findOrFail( $id );
        return view( 'admin.superadmin.profile', compact( 'profileData' ) );

    }

    public function AdminProfileStore( Request $request ) {

        // Validation
        $request->validate( [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            'photo'=>'required|mimes:jpeg,png,jpg,gif|max:2048'

        ] );

        $id = Auth::user()->id;
        $data = User::find( $id );
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->address = $request->address;

        if ( $request->has( 'photo' ) ) {
            $image = $this->uploadImage( 'admin_profile_uploads', $request->photo );
        }
        $data->profile_picture = $image;
        //

        /// Match The Old Password

        if ( !Hash::check( $request->old_password, auth::user()->password ) ) {

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );

            return back()->with( $notification );
        }

        /// Update The New Password

        User::whereId( auth()->user()->id )->update( [
            'password' => Hash::make( $request->new_password )

        ] );

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with( $notification );

    }
    // End Method

}

?>
