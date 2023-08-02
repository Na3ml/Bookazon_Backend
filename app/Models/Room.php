<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model 
{

    protected $table = 'rooms';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'price', 'size', 'amenities', 'total_bathrooms', 'total_balconies', 'total_guests', 'featured_photo');

}