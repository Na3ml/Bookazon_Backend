<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Property;
use App\Models\Room;

class DropdownController extends Controller {
    //

    /**
    * Write code on Method
    *
    * @return response()
    */

    public function fetchState( Request $request ) {
        $data[ 'states' ] = State::where( 'country_id', $request->country_id )
        ->get( [ 'name', 'id' ] );

        return response()->json( $data );
    }
    /**
    * Write code on Method
    *
    * @return response()
    */

    public function fetchCity( Request $request ) {
        $data[ 'cities' ] = City::where( 'state_id', $request->state_id )
        ->get( [ 'name', 'id' ] );

        return response()->json( $data );
    }

    public function index() {
        $properties = Property::count();
        $rooms = Room::count();
        $orders = Order::count();
        $bookers = User::where( 'role_id', 3 )->count();
        $admins = User::where( 'role_id', 1 )->count();
        $owners = User::where( 'role_id', 2 )->count();

        return view( 'admin.dashboard.index', compact( 'properties', 'rooms', 'orders', 'bookers', 'admins', 'owners' ) );
    }

}
