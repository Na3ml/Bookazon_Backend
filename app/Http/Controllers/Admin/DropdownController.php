<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

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
}
