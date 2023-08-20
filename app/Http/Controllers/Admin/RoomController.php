<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
 {

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function index()
 {
        $rooms = Room::latest()->get();
        //   dd( $rooms );
        $title = 'Delete Property!';
        $text = 'Are you sure you want to delete?';
        confirmDelete( $title, $text );
        return view( 'admin.room.index', compact( 'rooms' ) );

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function create()
 {
        $all_amenities = Amenity::get();
        $user = User::find( auth()->user()->id );
        $owner_properties = Auth::user()->properties;

        //   dd( $owner_properties );

        return view( 'admin.room.create', compact( 'all_amenities', 'owner_properties' ) );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */

    public function store( Request $request )
 {

        $amenites = '';
        $i = 0;
        if ( isset( $request->arr_amenities ) ) {
            foreach ( $request->arr_amenities  as $item ) {
                if ( $i == 0 ) {
                    $amenites .= $item;
                } else {
                    $amenites .= ',' .$item;
                }
                $i++;
            }
        }
        //   dd( $amenites );

        $date_range = $request->input( 'date_range' );
        $dates = explode( ' - ', $date_range );
        $availability_date_start = $dates[ 0 ];
        $availability_date_end = $dates[ 1 ];
        $new_start_date = date( 'Y-m-d', strtotime( $availability_date_start ) );
        $new_end_date = date( 'Y-m-d', strtotime( $availability_date_end ) );
        //   dd( [ $new_start_date, $new_end_date ] );
        //Image Uplaod
        $ext = $request->file( 'featured_photo' )->extension();
        $final_name = time().'.'.$ext;
        $request->file( 'featured_photo' )->move( public_path( 'dashboard/upload/room/image' ), $final_name );
        $image_Path = 'dashboard/upload/room/image/'.$final_name;
        //Video Upload
        $video_name = time().'_'.$request->video_id->getClientOriginalName();
        $request->file( 'video_id' )->move( public_path( 'dashboard/upload/room/video' ), $video_name );
        $file_Path = 'dashboard/upload/room/video/'.$video_name;
        //Room Number Code Auto Generated
        $room_number = IdGenerator::generate( [ 'table' => 'rooms', 'field' => 'room_number', 'length' => 6, 'prefix' => 'R22' ] );
        //   dd( $room_number );
        $room = new Room();
        $room->amenities = $amenites;
        $room->room_number = $room_number;
        $room->description = $request->description;
        $room->nightly_rate = $request->nightly_rate;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->availability_date_start = $new_start_date;
        $room->availability_date_end = $new_end_date;
        $room->occupancy_limit = $request->occupancy_limit;
        $room->Additional_fees = $request->Additional_fees;
        $room->total_beds = $request->total_beds;
        $room->total_bathrooms = $request->total_bathrooms;
        $room->total_balconies = $request->total_balconies;
        $room->total_guests = $request->total_guests;
        $room->featured_photo = $image_Path;
        $room->property_id  = $request->property_id;
        $room->video_id = $file_Path;
        $room->created_at = Carbon::now();
        $room->save();

        $notification = array(
            'message' => 'Room Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route( 'rooms.index' )->with( $notification );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function show( $id )
 {

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function edit( $id )
 {

        $all_amenities = Amenity::get();
        $room_data = Room::where( 'id', $id )->first();
        $owner_properties = Auth::user()->properties;

        $existing_amenities = array();
        if ( $room_data->amenities != '' ) {
            $existing_amenities = explode( ',', $room_data->amenities );
        }
        return view( 'admin.room.edit', compact( 'room_data', 'all_amenities', 'existing_amenities', 'owner_properties' ) );

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function update( $id, Request $request )
 {
        $obj = Room::where( 'id', $id )->first();

        $amenities = '';
        $i = 0;
        if ( isset( $request->arr_amenities ) ) {
            foreach ( $request->arr_amenities as $item ) {
                if ( $i == 0 ) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }

                $i++;
            }
        }

        // $request->validate( [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'total_rooms' => 'required'
        // ] );

        $room_number = IdGenerator::generate( [ 'table' => 'rooms', 'field' => 'room_number', 'length' => 6, 'prefix' => 'R22' ] );

        if ( $request->hasFile( 'featured_photo' ) ) {
            $request->validate( [
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ] );
            unlink( $obj->featured_photo );
            $ext = $request->file( 'featured_photo' )->extension();
            $final_name = time().'.'.$ext;
            $request->file( 'featured_photo' )->move( 'dashboard/upload/room/image/', $final_name );
            $obj->featured_photo = 'dashboard/upload/room/image/'.$final_name;
        }
        if ( $request->hasFile( 'video_id' ) ) {
            $request->validate( [
                'video_id' => 'mimes:mp4,mov,ogg | max:20000'
            ] );
            unlink( $obj->video_id );
            $path = $request->file( 'video_id' )->storeAs(
                'dashboard/upload/room/video',
                $request->file( 'video_id' )->getClientOriginalName() . '.' . $request->file( 'video_id' )->getClientOriginalExtension()
            );

            $obj->video_id = 'dashboard/upload/room/video/'.$path;
        }
        $date_range = $request->input( 'date_range' );
        $dates = explode( ' - ', $date_range );
        $availability_date_start = $dates[ 0 ];
        $availability_date_end = $dates[ 1 ];
        $new_start_date = date( 'Y-m-d', strtotime( $availability_date_start ) );
        $new_end_date = date( 'Y-m-d', strtotime( $availability_date_end ) );

        $obj->room_number = $room_number;
        $obj->description = $request->description;
        $obj->nightly_rate = $request->nightly_rate;
        $obj->room_type = $request->room_type;
        $obj->availability_date_start = $new_start_date;
        $obj->availability_date_end = $new_end_date;
        $obj->occupancy_limit = $request->occupancy_limit;
        $obj->Additional_fees = $request->Additional_fees;
        $obj->price = $request->price;
        $obj->amenities = $amenities;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->property_id  = $request->property_id;
        $obj->video_id = $request->video_id;
        $obj->created_at = Carbon::now();
        $obj->update();

        $notification = array(
            'message' => 'Room  is Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route( 'rooms.index' )->with( $notification );

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function destroy( $id )
 {
        $room = Room::findOrFail( $id );

        $pathTodelete3 = public_path( $room->featured_photo );
        $videoPath = $room->video_id;
        // dd( $pathTodelete3 );
        if ( File::exists( $pathTodelete3 ) ) {
            // File::delete( $image_path );
            unlink( $pathTodelete3 );
        }
        if ( File::exists( $videoPath ) ) {
            // File::delete( $image_path );
            unlink( $videoPath );
        }

        $room->delete();

        $notification = array(
            'message' => 'Room has been Deleted!',
            'alert-type' => 'error'
        );

        return redirect()->route( 'rooms.index' )->with( $notification );
    }

}

?>
