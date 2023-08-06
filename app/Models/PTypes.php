<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTypes extends Model 
 {

    protected $table = 'property_types';
    public $timestamps = true;
    protected $fillable = array( 'type_name', 'type_icon', 'property_id', 'created_at' );

}