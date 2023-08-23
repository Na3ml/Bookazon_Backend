<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
 {

    protected $table = 'facilities';
    public $timestamps = true;
    protected $fillable = array( 'facility_name', 'distance', 'property_id ' );

    public function setFacilityNameAttribute( $value )
 {
        $this->attributes[ 'facility_name' ] = json_encode( $value );
    }

    public function property(){
        $this->belongsTo(Property::class);
    }

    /**
    * Get the facility_name
    *
    */

    public function getFacilityNameAttribute( $value )
 {
        return $this->attributes[ 'facility_name' ] = json_decode( $value );
    }

    public function setDistanceAttribute( $value )
 {
        $this->attributes[ 'distance' ] = json_encode( $value );
    }

    /**
    * Get the distance
    *
    */

    public function getDistanceAttribute( $value )
 {
        return $this->attributes[ 'distance' ] = json_decode( $value );
    }

}
