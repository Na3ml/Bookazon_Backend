<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\User;
use App\Models\Property;
use App\Models\PTypes;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Property\StoreProperty;
use App\Models\Photo;
use App\Models\Country;
use App\Models\Facility;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use App\Traits\GeneralTrait;

class PropertyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    use GeneralTrait;

    public function index( $owner ) {
        $properties = Property::latest()->get();
        $title = 'Delete Property!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'admin.property.index', compact( 'properties', 'owner' ) );
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

    public function store( StoreProperty $request, $owner ) {

        if ( $owner ) {
            //            dd( $request->amenities_id );
            $amen = $request->amenities_id;

            $amenites = implode( ',', $amen );

            $date_range = $request->input( 'date_range' );
            $dates = explode( ' - ', $date_range );
            $availability_date_start = $dates[ 0 ];
            $availability_date_end = $dates[ 1 ];
            $new_start_date = date( 'Y-m-d', strtotime( $availability_date_start ) );
            $new_end_date = date( 'Y-m-d', strtotime( $availability_date_end ) );

            $pcode = Str::random(16);
            $image = '';
            if ( $request->has( 'property_thambnail' ) ) {
                $image = $this->uploadImage( 'property_Thambinal_uploads', $request->property_thambnail );
            }
            $property_id = Property::insertGetId( [

                'ptype_id' => $request->ptype_id,
                'amenities_id' => $amenites,
                'property_name' => $request->property_name,
                'slug' => strtolower( str_replace( ' ', '-', $request->property_name ) ),
                'property_code' => $pcode,
                'property_status' => $request->property_status,
                'Additional_fees'=>$request->Additional_fees,
                'price' => $request->price,
                'availability_date_start' => $new_start_date,
                'availability_date_end' => $new_end_date,
                'description' => strip_tags( $request->description ),
                'property_size' => $request->property_size,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country'=>$request->country,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'featured' => $request->featured,
                'hot' => $request->hot,
                'user_id' => $owner,
                'property_thumbnail' => $image,
                'created_at' => Carbon::now(),

            ] );
            // dd( $property_id );
            $images = $request->file( 'multi_img' );
            if ( $request->hasfile( 'multi_img' ) ) {
                foreach ( $images as $img ) {
                    $multiImages = $this->uploadImage( 'property_MultiImage_uploads', $img );

                    Photo::insert( [

                        'property_id' => $property_id,
                        'photo' => $multiImages,
                        'created_at' => Carbon::now(),

                    ] );
                }
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
            $notification = array(
                'message' => 'Property Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route( 'property.index', $owner )->with( $notification );
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
        $owner = $owner;
        $property = Property::findOrFail( $id );
        // dd( $property->property_thumbnail );
        $type = $property->amenities_id ;
        $property_ami = explode( ', ', $type );
        $propertytype = PTypes::latest()->get();
        $amenities = Amenity::latest()->get();
        $multiImage = Photo::where( 'property_id', $id )->get();
        $facilities = Facility::where( 'property_id', $id )->get();
        $data[ 'countries' ] = Country::get( [ 'name', 'id' ] );
        $activeAgent = User::where( 'status', 'active' )->where( 'role_id', 2 )->latest()->get();

        return view( 'admin.property.edit', $data, compact( 'owner', 'property', 'propertytype', 'amenities',  'activeAgent', 'property_ami', 'facilities', 'multiImage' ) );

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function update( StoreProperty $request, $owner, $id ) {
        if ( $owner ) {

            $amen = $request->amenities_id;
            $amenites = implode( ', ', $amen );
            // dd( $amenites );
            $pcode = Str::random(16);
            $oldImage = $request->old_img;

            if ( $request->has( 'property_thambnail' ) ) {
                $image = $this->uploadImage( 'property_Thambinal_uploads', $request->property_thambnail );
            }

            Property::findOrFail( $id )->update( [
                'property_thumbnail' =>$image,
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
                'created_at' => Carbon::now(),

            ] );

            $notification = array(
                'message' => 'Property Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route( 'property.index', $owner )->with( $notification );
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

        $pathTodelete3 = url( $property->property_thumbnail );
        // dd( $pathTodelete3 );
        if ( File::exists( $pathTodelete3 ) ) {
            // File::delete( $image_path );
            unlink( $pathTodelete3 );
        }
        $property->delete();

        $notification = array(
            'message' => 'Property has been deleted!!',
            'alert-type' => 'error'
        );

        return redirect()->route( 'property.index', $owner )->with( $notification );
    }

    public function UpdatePropertyFacilities( Request $request ) {

        $pid = $request->id;

        if ( $request->facility_name == NULL ) {
            return redirect()->back();
        } else {
            Facility::where( 'property_id', $pid )->delete();

            $facilities = Count( $request->facility_name );

            for ( $i = 0; $i < $facilities; $i++ ) {

                $fcount = new Facility();
                $fcount->property_id = $pid;
                $fcount->facility_name = $request->facility_name[ $i ];
                $fcount->distance = $request->distance[ $i ];
                $fcount->save();
            }
            // end for
        }

        Alert::success( 'Properties', 'Property Facility Updated  Successfully' );

        return redirect()->back();

    }
    // End Method

    public function UpdatePropertyThambnail( Request $request ) {

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file( 'property_thambnail' );
        $name_gen = hexdec( uniqid() ).'.'.$image->getClientOriginalExtension();
        Image::make( $image )->resize( 370, 250 )->save( 'dashboard/upload/property/thambnail/'.$name_gen );
        $save_url = 'dashboard/upload/property/thambnail/'.$name_gen;

        if ( file_exists( $oldImage ) ) {
            unlink( $oldImage );
        }

        Property::findOrFail( $pro_id )->update( [

            'property_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ] );

        Alert::success( 'Properties', 'Property Image Thambnail Updated  Successfully' );

        return redirect()->back();

    }
    // End Method

    public function UpdatePropertyMultiimage( Request $request ) {

        $imgs = $request->multi_img;

        foreach ( $imgs as $id => $img ) {
            $imgDel = Photo::findOrFail( $id );
            unlink( $imgDel->photo_name );

            $make_name = hexdec( uniqid() ).'.'.$img->getClientOriginalExtension();
            Image::make( $img )->resize( 770, 520 )->save( 'dashboard/upload/property/multi_image/'.$make_name );
            $uploadPath = 'dashboard/upload/property/multi_image/'.$make_name;

            Photo::where( 'id', $id )->update( [

                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ] );

        }
        // End Foreach

        Alert::success( 'Properties', 'Property Multi Image Updated  Successfully' );

        return redirect()->back();

    }
    // End Method

}
