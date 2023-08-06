<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PTypes;
use App\Http\Requests\PropertType\StorePropertTypeRequest;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class Property_TypeController extends Controller {
    /**
    * Display a listing of the resource.
    */

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
        $image_icon = $request->type_icon;
        if ( $request->hasFile( 'type_icon' ) ) {
            $TypeIcon = uniqid() . '.' . $image_icon->getClientOriginalExtension();
            Image::make( $image_icon )->resize( 500, 300 )->save( 'dashboard/Properties/Type/' . $TypeIcon );
            $data[ 'type_icon' ] = 'dashboard/Properties/Type/' . $TypeIcon;
        }

        PTypes::insert( $data );
        Alert::success( 'Property Type', 'Property Type Added Successfully' );
        return Redirect()->route( 'propertytype.index' );
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
        $image_icon = $request->type_icon;
        if ( $request->hasFile( 'type_icon' ) ) {
            $TypeIcon = uniqid() . '.' . $image_icon->getClientOriginalExtension();
            Image::make( $image_icon )->resize( 500, 300 )->save( 'dashboard/Properties/Type/' . $TypeIcon );
            $data[ 'type_icon' ] = 'dashboard/Properties/Type/' . $TypeIcon;

            $oldimage = $request->oldimage;
            $pathTodelete = public_path( $oldimage );
            // dd( $pathTodelete );
            if ( file_exists( $pathTodelete ) ) {
                unlink( $pathTodelete );
            } else {
                dd( 'File does not exists.' );
            }
        }
        $type = PTypes::where( 'id', $id );
        $type->update( $data );
        Alert::success( 'Property Type', 'Property Type updated Successfully' );
        return Redirect()->route( 'propertytype.index' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
        $type = PTypes::findOrFail( $id );

        $pathTodelete3 = public_path( $type->type_icon );
        // dd( $pathTodelete3 );
        if ( File::exists( $pathTodelete3 ) ) {
            // File::delete( $image_path );
            unlink( $pathTodelete3 );
        }
        $type->delete();
        alert()->error( 'Property Type been deleted!', 'Deleting Action' );

        // Alert::toast( 'Property Type been deleted!', 'success' );
        return back();
    }
}
