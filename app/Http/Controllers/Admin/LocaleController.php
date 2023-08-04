<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class LocaleController extends Controller {

    protected $previousRequest;
    protected $locale;

    public function switchLang( $locale ) {
        // $user = Auth::user();
        if ( array_key_exists( $locale, Config::get( 'locales.languages' ) ) ) {
            App::setLocale( app()->getLocale() );
        }
        return Redirect::back();
    }

}
