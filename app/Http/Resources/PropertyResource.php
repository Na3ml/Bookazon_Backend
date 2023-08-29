<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Amenity;

class PropertyResource extends JsonResource {
    /**
    * Transform the resource into an array.
    *
    * @return array<string, mixed>
    */

    public function toArray( Request $request ): array {
        $arr = explode( ',', $this->amenities_id );
        $amenities = array();
        for ( $j = 0; $j<count( $arr );
        $j++ ) {
            $temp_row = Amenity::where( 'id', $arr[ $j ] )->first();
            $amenities[] = $temp_row->amenities_name;
        }
        $Country = Country::where( 'id', $this->country )->pluck( 'name' );
        $State = State::where( 'id', $this->state )->pluck( 'name' );
        $City = City::where( 'id', $this->city )->pluck( 'name' );

        return [

            'Unique_ID'=>$this->id,
            'slug '=>$this->slug,
            'property_name'=>$this->property_name,
            'property_code'=>$this->property_code,
            'price'=>$this->price.' '.'LE',
            'description'=>strip_tags( $this->description ),
            'main_image'=>$this->property_thumbnail,
            'property_size'=>$this->property_size,
            'address'=>$this->address,
            'country'=>$Country,
            'state'=> $State,
            'city'=>$City,
            'availability_date_start' => date( 'Y-m-d', strtotime( $this->availability_date_start ) ),
            'availability_date_end' => date( 'Y-m-d', strtotime( $this->availability_date_end ) ),
            'Additional_fees'=>$this->Additional_fees,
            'Additional_fees'=>$this->Additional_fees,
            'longitude'=>$this->longitude,
            'total_bathrooms'=>$this->total_bathrooms,
            'latitude'=>$this->latitude,
            'Property_Type'=>$this->type,
            'Facilities'=>$this->facilities,
            'Amenities'=>$amenities,
            'Owner'=>$this->user,
            'Multi_Images'=>$this->photos,
            'rooms'=>$this->rooms,

        ];
    }
}
