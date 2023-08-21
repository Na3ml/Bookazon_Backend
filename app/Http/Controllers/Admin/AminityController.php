<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Amenity;
use RealRashid\SweetAlert\Facades\Alert;

class AminityController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        //
        $Aminties = Amenity::latest()->get();
        $title = 'Delete Aminity!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'admin.aminity.index', compact( 'Aminties' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
        return view( 'admin.aminity.create' );

    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
        $data = [
            'amenities_name'=>$request->amenities_name,

        ];
        Amenity::insert( $data );
        $notification = array(
            'message' => 'Aminties Added Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route( 'aminities.index' )->with( $notification );
        ;
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
        $Aminties = Amenity::findOrFail( $id );
        return view( 'admin.aminity.edit', compact( 'Aminties' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
        $data = [
            'amenities_name'=>$request->amenities_name,

        ];

        $Amenity = Amenity::where( 'id', $id );
        $Amenity->update( $data );
        $notification = array(
            'message' => 'Amenity updated Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route( 'aminities.index' )->with( $notification );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
        $Amenity = Amenity::findOrFail( $id );

        $Amenity->delete();

        $notification = array(
            'message' => 'Amenity has been deleted!!',
            'alert-type' => 'error'
        );
        return back()->with( $notification );
    }
}
