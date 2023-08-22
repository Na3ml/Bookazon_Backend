<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class PTypes extends Model 
 {

    protected $table = 'property_types';
    public $timestamps = true;
    protected $fillable = array( 'type_name', 'type_icon', 'created_at' );

    public function getTypeIconAttribute( $value )
 {
        return url( '/dashboard/Properties/Type' ) .'/'. $value;
    }

}