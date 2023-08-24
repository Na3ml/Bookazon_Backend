<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Amenity;
use App\Http\Resources\PropertyRsource;

class RoomResource extends JsonResource {
    protected $property_status;

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
            $amenities[] = $temp_row->amenities_name;
        }

        return [

            'room_number'=>$this->room_number,
            'description'=>strip_tags( $this->description ),
            'nightly_rate'=>$this->nightly_rate,
            'price'=>$this->price . ' ' .'LE',
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
            'featured_photo'=>$this->featured_photo,
            'property_id'=>$this->property_id,
            'video_id'=>$this->video_id,

            'property'=> new PropertyRsource( $this->property ),

        ];
    }
}
