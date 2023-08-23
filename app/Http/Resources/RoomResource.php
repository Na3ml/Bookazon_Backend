<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\City;
use App\Models\State;

class RoomResource extends JsonResource
{
    protected $property_status;

    public function propertyStatus(){
        if($this->property_status == 1){
            return 'Active';
        }else{
            return 'InActive';
        }

    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
                        $arr = explode(',',$this->amenities_id);
                        $amenities = array();
                        for($j=0;$j<count($arr);$j++) {
                            $temp_row = Amenity::where('id',$arr[$j])->first();
                           $amenities[] = $temp_row->amenities_name;
                        }
                        $Country = Country::where('id',$this->country)->pluck('name');
                        $State = State::where('id',$this->state)->pluck('name');
                        $City = City::where('id',$this->city)->pluck('name');
                        $Owner = User::where('id',$this->user_id)->pluck(['first_name','last_name'])


        return [

            'id' => $this->id,
            'property_name' => $this->property_name,
            'property_code' => $this->property_code,
            'property_status' => $this->propertyStatus,
            'description' => strip_tags($this->description),
            'amenities' => $amenities,
//            'photos' => $this->$date->format('Y-m-d');,
            'availability_date_start' => date('Y-m-d',strtotime($this->availability_date_start)),
            'availability_date_end' => date('Y-m-d',strtotime($this->availability_date_end)),
            'country' => $Country,
            'state' => $State,
            'city' => $City,
            'property_size' => $this->property_size,
            'address' => $this->address,
            'Additional_fees' => $this->Additional_fees,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'Propert Owner' => $this->created_at,
            'video_id' => $this->video_id,

            'room'=>$this->rooms,
        ];
    }
}
