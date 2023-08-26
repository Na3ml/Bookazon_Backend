<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\User;

class RoomResource extends JsonResource {
    protected $property_status;

    public function propertyStatus() {
        if ( $this->property_status == 1 ) {
            return 'Active';
        } else {
            return 'InActive';
        }

    }
    /**
    * Transform the resource into an array.
    *
    * @return array<string, mixed>
    */

    public function toArray( Request $request ): array {
        $arr = explode( ',', $this->amenities );
        $amenities = array();
        for ( $j = 0; $j<count( $arr );
        $j++ ) {
            $temp_row = Amenity::where( 'id', $arr[ $j ] )->first();
            $amenities['name'] = $temp_row->amenities_name;
            $amenities['id'] = $temp_row->id;
        }
        // $Country = Country::where( 'id', $this->country )->pluck( 'name' );
        // $State = State::where( 'id', $this->state )->pluck( 'name' );
        // $City = City::where( 'id', $this->city )->pluck( 'name' );
        // $Owner = User::where( 'id', $this->user_id )->pluck( [ 'first_name', 'last_name' ] );

        return [

            'room_number'=>$this->room_number,
            'description'=>strip_tags( $this->description ),
            'nightly_rate'=>$this->nightly_rate,
            'price'=>$this->price,
            'room_type'=>$this->room_type,
            'amenities'=>$amenities,
            'availability_date_start' => date( 'Y-m-d', strtotime( $this->availability_date_start ) ),
            'availability_date_end' => date( 'Y-m-d', strtotime( $this->availability_date_end ) ),
            'occupancy_limit'=>$this->occupancy_limit,
            'Additional_fees'=>$this->Additional_fees,
            'total_beds'=>$this->total_beds,
            'total_bathrooms'=>$this->total_bathrooms,
            'total_balconies'=>$this->total_balconies,
            'total_guests'=>$this->total_guests,
            'featured_photo'=>asset('/').$this->featured_photo,
            'property_id'=>$this->property_id,
            'video_id'=>asset('/').$this->video_id,
//            'property'=>PropertyResource::make($this->property),
            'created_at'=>date('Y-m-d',strtotime($this->created_at)),
            'updated_at'=>date('Y-m-d',strtotime($this->updated_at)),

        ];
    }
}
