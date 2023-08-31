<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Property;
use Tymon\JWTAuth\Facades\JWTAuth;
use function inclued\sendError;
use function inclued\sendResponse;

class HomeController extends Controller {
    //

    public function newSearch( Request $request ) {
        $request->validate( [
            'city'=> 'required',
            'check_out'=> 'required',
            'check_in'=> 'required',
            'total_guests'=> 'required',
        ] );
        $ids = Order::where( 'check_in_date', $request->check_in )->orWhere( 'check_out_date', $request->check_in )->orWhere( 'check_in_date', $request->check_out )
        ->orWhere( [
            [ 'check_out_date', '<=', $request->check_out ],
            [ 'check_in_date', '>=', $request->check_in ],
        ] )->pluck( 'room_id' );
        // get not available rooms

        if ( $request->has( 'city' ) ) {
            $city = City::where( 'name', 'like', '%' . $request->city . '%' )->first();
            //get city
        }
        $rooms = Room::whereNotIn( 'id', $ids )->where( 'total_guests', $request->total_guests )->pluck( 'property_id' );
        //get all available room and pluck property_ids
        $rooms = $rooms->unique();
        //unique
        $properties = Property::with( [ 'rooms', 'type', 'facilities' ] )->where( 'city', $city->id )->whereIn( 'id', $rooms )->get();
        if ( count( $properties ) > 0 ) {
            return sendResponse( PropertyResource::collection( $properties ), 'good' );
        }
        return sendError( '', 'sorry no more room available , please try again' );
    }

    public function book( Request $request ) {
        $user = User::find( JWTAuth::parseToken()->authenticate()->id );
        $ids = Order::where( 'check_in_date', $request->check_in )->orWhere( [
            [ 'check_out_date', '<=', $request->check_out ],
            [ 'check_in_date', '>=', $request->check_in ],
            [ 'check_in_date', $request->check_out ],
            [ 'check_out_date', $request->check_in ]
        ] )->pluck( 'room_id' );
        $room = Room::where( [
            [ 'property_id', $request->property_id ],
            [ 'total_guests', $request->total_guests ],
        ] )->WhereNotIn( 'id', $ids )->first();
        if ( !$room ) {
            return sendError( '', 'sorry no more rooms available' );
        }
        $days = ( strtotime( $request->check_out ) - strtotime( $request->check_in ) ) / ( 60 * 60 * 24 );
        $price = $days * $room->price;
        $addition = $room->Additional_fees;
        $total = $price + $addition;
        $order = Order::create( [
            'user_id' => $user->id,
            'room_id' => $room->id,
            'order_no' => rand( 000000, 99999 ),
            'booking_date' => Carbon::now(),
            'check_in_date' => $request->check_in,
            'check_out_date' => $request->check_out,
            'transaction_id' => rand( 000000, 99999 ),
            'paid_amount' => $total,
            'payment_method' => 'stripe',
            'status' => 0, //0 =>waiting to confirmed || 1=> confirmed from user || 2 =>cancel || 3 =>complete
        ] );

        if ( $order ) {
            return sendResponse( $order, 'please confirm your request' );
        }
        return sendError( '', 'error' );
    }
}
