<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\User;

class PropertyResource extends JsonResource {
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
        $arr = explode( ',', $this->amenities_id );
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
            'property_id'=>$this->id,
            'ptype' => $this->type,
            'amenities' => $amenities,
            'facilities' => $this->facilities,
            'property_name' => $this->property_name,
            'slug' => $this->property_name,
            'property_code' => $this->property_code,
            'property_status' => $this->property_status,
            'Additional_fees'=>$this->Additional_fees,
            'price' => $this->price,
            'availability_date_start' => $this->availability_date_start,
            'availability_date_end' => $this->availability_date_end,
            'description' => $this->description,
            'property_size' => $this->property_size,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'country'=>$this->country,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'featured' => $this->featured,
            'hot' => $this->hot,
            'property_thumbnail' => asset('/').$this->property_thumbnail,
            'created_at' =>date('Y-m-d',strtotime($this->created_at)) ,
//            'updated_at' =>date('Y-m-d',strtotime($this->updated_at)) ,
            'rooms' =>RoomResource::collection($this->rooms) ,

        ];
    }
}
