<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class FavoriteController extends Controller {
    //
    use ApiResponseTrait;
    public function index() {
        $favorites = Favorite::with( 'properties' )->get();

        return $this->apiResponse( 'successfully', $favorites );
    }

    public function store( Request $request ) {

        $validator = validator::make( $request->all(), [
            'property_id' => 'required|exists:properties,id',
        ] );

        if ( $validator->fails() ) {
            return $this->apiResponseValidation( $validator );
        }

        $property = Property::find( $request->post( 'property_id' ) );
        $user = User::find( JWTAuth::parseToken()->authenticate()->id );

        if ( $property->property_status != 1 ) {
            return $this->apiResponse( 'not allow add it', null, 422 );
        }

        $isExist = Favorite::where( 'property_id', $request->property_id )->where( 'user_id', $user->id )->first();
//        dd($isExist);
        if ( $isExist ) {
            $isExist->delete();
            return $this->apiResponse( 'successfully remove it', $isExist );
        }

        $favorite = Favorite::create( [
            'property_id' => $request->property_id,
            'user_id' => $user->id,
        ] );

        return $this->apiResponse( 'successfully added it', $favorite );
    }

    public function destroy( Request $request ) {
        $validator = validator::make( $request->all(), [
            'property_id' => 'required|exists:properties,id',
        ] );

        if ( $validator->fails() ) {
            return $this->apiResponseValidation( $validator );
        }
        $user = User::find( JWTAuth::parseToken()->authenticate()->id );
        $property = Favorite::where( 'property_id', $request->post( 'property_id' ) )
        ->where( 'user_id', $user->id )->first();

        if ( $property ) {
            $property->delete();

            return $this->apiResponse( 'successfully removed From Favorites' );
        }

        return $this->apiResponse( 'not found it', null, 422 );
    }

}
