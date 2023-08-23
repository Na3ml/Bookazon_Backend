<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Property;
use Tymon\JWTAuth\Facades\JWTAuth;
use function inclued\sendError;
use function inclued\sendResponse;

class HomeController extends Controller
 {
    //

    public function newSearch( Request $request )
 {

        $ids = Order::where( 'check_in_date', $request->check_in )->orWhere( 'check_out_date', $request->check_in )->orWhere( 'check_in_date', $request->check_out )
        ->pluck( 'room_id' );

        if ( $request->has( 'city' ) ) {
            $city = City::with( 'rooms' )->where( 'name', 'like', '%'.$request->city.'%' )->first();
        }

        $rooms = $city->rooms;
        // dd( $rooms );
        $rooms = $rooms->whereNotIn( 'id', $ids )->where( 'total_guests', '>=', $request->total_guests );
        if ( count( $rooms ) > 0 ) {
            return sendResponse( RoomResource::collection( $rooms ), 'good' );
        }
        return sendError( '', 'sorry no more room available , please try again' );
    }

    public function book( Request $request ) {
        $user = User::find( JWTAuth::parseToken()->authenticate()->id );
        return $user;
        dd( $request->all() );
    }
}
