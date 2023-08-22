<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTypes extends Model
 {
    use HasFactory ;

    protected $table = 'property_types';
    public $timestamps = true;
    protected $fillable = array( 'type_name', 'type_icon', 'created_at' );

}
