<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Room extends Model
 {

    protected $table = 'rooms';
    public $timestamps = true;
    protected $fillable = array( 'name', 'description', 'price', 'size', 'amenities', 'total_bathrooms', 'total_balconies', 'total_guests', 'featured_photo' );

    public function property()
 {
        return $this->belongsTo( Property::class, 'property_id', 'id' );

    }

//    public function city(){
//        return $this->hasOneThrough();
//    }
}
