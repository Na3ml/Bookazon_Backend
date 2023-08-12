<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PTypes;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Country;
use App\Models\Facility;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function index() {
        dd( 'fdfgbd' );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function create( $owner, Request $request ) {
        $propertytype = PTypes::latest()->get();
        $amenities = Amenity::latest()->get();
        $data[ 'countries' ] = Country::get( [ 'name', 'id' ] );

        return view( 'admin.property.create', $data, compact( 'owner', 'propertytype', 'amenities', ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */

    public function store( Request $request, $owner ) {

        if ( $owner ) {
            $amen = $request->amenities_id;

            $amenites = implode( ',', $amen );

            $pcode = IdGenerator::generate( [ 'table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => '11' ] );

            $image = $request->property_thambnail;
            // dd( $image );
            $imageName = time().'.'.$request->property_thambnail->extension();

            $request->property_thambnail->move( public_path( 'dashboard/upload/property/thambnail/' ), $imageName );

            $property_id = Property::insertGetId( [

                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'property_name' => $request->property_name,
                'slug' => strtolower( str_replace( ' ', '-', $request->property_name ) ),
                'property_code' => $pcode,
                'property_status' => $request->property_status,
                'Additional_fees'=>$request->Additional_fees,
                'price' => $request->price,
                'description' => $request->description,
                'property_size' => $request->property_size,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country'=>$request->country,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'featured' => $request->featured,
                'hot' => $request->hot,
                'user_id' => auth()->user()->id,
                'property_thumbnail' => $imageName,
                'created_at' => Carbon::now(),

            ] );

            $images = $request->file( 'multi_img' );
            foreach ( $images as $img ) {

                $make_name = hexdec( uniqid() ).'.'.$img->getClientOriginalExtension();
                Image::make( $img )->resize( 770, 520 )->save( 'dashboard/upload/property/multi_image/'.$make_name );
                $uploadPath = 'dashboard/upload/property/multi_image/'.$make_name;

                Photo::insert( [

                    'property_id' => $property_id,
                    'photo' => $uploadPath,
                    'created_at' => Carbon::now(),

                ] );

            }
            // End Foreac

            $facilities = Count( $request->facility_name );
            // dd( $facilities );
            if ( $facilities != NULL ) {
                for ( $i = 0; $i < $facilities; $i++ ) {

                    $fcount = new Facility();
                    $fcount->property_id = $property_id;
                    $fcount->facility_name = $request->facility_name[ $i ];
                    $fcount->distance = $request->distance[ $i ];
                    $fcount->save();
                }
            }

            /// End Facilities  ////

            Alert::success( 'Properties', 'Property Inserted Successfully' );

            return redirect()->route( 'propertyowner.show', $owner );
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

    public function edit( $owner, $id ) {
        //      $owner = $owner;
        $property = Property::findOrFail( $id );

        return view( 'admin.property.edit', compact( 'owner', 'property' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function update( Request $request, $owner, $id ) {
        if ( $owner ) {
            $property = Property::findOrFail( $id );
            $property->update( [
                'property_code' => $request->property_code,
                'property_status' => $request->property_status,
                'price' => $request->price,
                'description' => $request->description,
                'property_size' => $request->property_size,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'Additional_fees' => $request->Additional_fees,
            ] );

            return redirect()->route( 'propertyowner.show', $owner );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function destroy( $owner, $id ) {
        $property = Property::findOrFail( $id );
        $property->delete();

        return redirect()->route( 'propertyowner.show', $owner );
    }
}
