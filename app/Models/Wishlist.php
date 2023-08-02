<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model 
{

    protected $table = 'wishlists';
    public $timestamps = true;
    protected $fillable = array('property_id');

}