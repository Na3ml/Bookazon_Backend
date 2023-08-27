<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use function inclued\sendError;
use function inclued\sendResponse;

class PropertyController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */

    public function index() {
        $properties = Property::with( [ 'type', 'facilities', 'rooms' ] )->paginate( 10 );
        if ( $properties )
        return sendResponse( PropertyResource::collection( $properties ), 'all properties' );
        return sendError( '', 'not found' );
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */

    public function show( $id ) {
        $property = Property::with( [ 'user', 'type', 'rooms', 'facilities' ] )->find( $id );
        if ( $property )
        return sendResponse( PropertyResource::make( $property ), 'good' );
        return sendError( '', 'no data' );

    }

}
