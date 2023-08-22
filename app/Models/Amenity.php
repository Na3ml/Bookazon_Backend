<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
 {
     use HasFactory ;

    protected $table = 'amenities';
    public $timestamps = true;
    protected $fillable = array( 'amenities_name' );

}
