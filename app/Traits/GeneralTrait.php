<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

trait GeneralTrait
 {

    public function get_default_lang()
 {
        return   Config::get( 'app.locale' );
    }

    public function uploadImage( $folder, $image )
 {
        $image->store( '/', $folder );
        $filename = $image->hashName();
        // $path = 'images/' . $folder . '/' . $filename;
        return $filename;
    }

    public function uploadVideo( $folder, $video )
 {
        $video->store( '/', $folder );
        $filename = $video->hashName();
        // $path = '/' . $folder . '/' . $filename;
        return $filename;
    }
}