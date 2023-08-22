<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PTypes;
use App\Http\Requests\PropertType\StorePropertTypeRequest;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use App\Traits\GeneralTrait;

class Property_TypeController extends Controller {
    /**
    * Display a listing of the resource.
    */
    use GeneralTrait;

    public function index() {
        //
        $types = PTypes::latest()->get();
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'admin.type.index', compact( 'types' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
        return view( 'admin.type.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( StorePropertTypeRequest $request ) {
        //
        $data = [
            'type_name'=>$request->type_name,

        ];

        if ( $request->has( 'type_icon' ) ) {
            $type_image = $this->uploadImage( 'property_Type_uploads', $request->type_icon );
            $data[ 'type_icon' ] =  $type_image;
        }

        PTypes::insert( $data );
        $notification = array(
            'message' => 'Property Type Type Added Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route( 'propertytype.index' )->with( $notification );
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
        $type = PTypes::findOrFail( $id );
        return view( 'admin.type.edit', compact( 'type' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( StorePropertTypeRequest $request, string $id ) {
        //

        $data = [
            'type_name'=>$request->type_name,

        ];

        if ( $request->has( 'type_icon' ) ) {
            $type_image = $this->uploadImage( 'property_Type_uploads', $request->type_icon );
            $data[ 'type_icon' ] =  $type_image;

        }
        $type = PTypes::where( 'id', $id );
        $type->update( $data );
        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route( 'propertytype.index' )->with( $notification );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
        $type = PTypes::findOrFail( $id );

        $pathTodelete3 = url( $type->type_icon );
        // dd( $pathTodelete3 );
        if ( File::exists( $pathTodelete3 ) ) {
            // File::delete( $image_path );
            unlink( $pathTodelete3 );
        }
        $type->delete();

        $notification = array(
            'message' => 'Property Type has been Deleted!',
            'alert-type' => 'error'
        );

        return back()->with( $notification );
    }
}
