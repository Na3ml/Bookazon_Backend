<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableObserver;

class Property extends Model
 {
    use HasFactory;
    use Sluggable;

    protected $table = 'Properties';
    public $timestamps = true;
    protected $fillable = array( 'slug', 'property_name', 'property_code', 'property_status', 'price', 'description', 'property_size', 'property_thumbnail', 'address', 'country', 'state', 'city', 'Additional_fees', 'latitude', 'status', 'featured', 'user_id', 'hot', 'amenities_id', 'ptype_id', 'created_at' );

    public function user()
 {
        return $this->belongsTo( User::class );
    }

    public function type() {
        return $this->belongsTo( PTypes::class, 'ptype_id', 'id' );
    }


    public function rooms()
 {
        return $this->hasMany( Room::class );
    }

    public function facilities()
    {
        return $this->hasMany( Facility::class );
    }

    public function sluggable(): array
 {
        return [
            'slug' => [
                'source' => 'property_code'
            ]
        ];
    }

    public function sluggableEvent(): string
 {
        /**
        * Default behaviour -- generate slug before model is saved.
        */
        return SluggableObserver::SAVING;

        /**
        * Optional behaviour -- generate slug after model is saved.
        * This will likely become the new default in the next major release.
        */
        return SluggableObserver::SAVED;
    }

    public function setAminitiesAttribute( $value )
 {
        $this->attributes[ 'amenities_id' ] = json_encode( $value );
    }

    /**
    * Get the categories
    *
    */

    public function getAminitiesAttribute( $value )
 {
        return $this->attributes[ 'amenities_id' ] = json_decode( $value );
    }

    public function getPropertyThumbnailAttribute( $value )
 {
        return url( 'dashboard/upload/property/thambnail' ).'/'.$value;
    }
}
