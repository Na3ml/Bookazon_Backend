<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function inclued\sendError;
use function inclued\sendResponse;
use App\Models\Room;
use App\Http\Resources\RoomResource;

class RoomController extends Controller {
    //

    public function index() {
        $room = Room::with( 'property' )->paginate( 10 );
        if ( $room )
        return sendResponse( RoomResource::collection( $room ), 'all Rooms' );
        return sendError( '', 'not found' );
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function show( $id ) {
        $room = Room::with( 'property' )->find( $id );
        // dd( $room );
        if ( $room )
        return sendResponse( new RoomResource( $room ), 'good' );
        return sendError( '', 'no data' );

    }
}
