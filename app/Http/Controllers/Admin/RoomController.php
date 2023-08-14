<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $owner_properties = User::find( auth()->user()->id )->properties();
        dd( $owner_properties );
        return view( 'admin.room.create', compact( 'all_amenities', 'owner_properties' ) );

    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */

    public function store( Request $request )
 {

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

    public function destroy( $id )
 {

    }

}

?>
