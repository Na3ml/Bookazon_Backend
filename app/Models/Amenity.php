<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model 
{

    protected $table = 'amenities';
    public $timestamps = true;
    protected $fillable = array('amenities_name', 'property_id');

}