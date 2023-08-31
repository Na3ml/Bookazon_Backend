<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Favorite;
use function inclued\sendError;
use Illuminate\Support\Facades\Validator;
use function inclued\sendResponse;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth:api');
    }

    //
    public function index() {
        $favorites = Favorite::with('properties')->get();

        return sendResponse(  $favorites,'successfully' );
    }

    public function store( Request $request ) {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
        ]);
        $property = Property::find( $request->post( 'property_id' ) );
        if ( $property->property_status != 1 ) {
            return sendError( '','not allow add it',  422 );
        }

        $user = Auth::user()->favorites()->toggle($property->id);

        return sendResponse( '','successfully added it' );
    }

    public function destroy( Request $request ) {
        $validator = validator::make( $request->all(), [
            'property_id' => 'required|exists:properties,id',
        ] );

        if ( $validator->fails() ) {
            return sendError( '',$validator );
        }

        $property = Favorite::where('property_id', $request->post( 'property_id' ) )
            ->where('user_id', Auth::id() )->first();

        if ( $property ) {
            $property->delete();
            return sendResponse( '','successfully' );
        }

        return sendError( '','not found it', 422 );
    }

}
