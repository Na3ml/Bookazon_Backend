<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboards


    Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('dashboard')->group(function () {
Route::view('/', 'dashboards.default_dashboard')->name('dashboard');
});


//page_layout
Route::view('box-layout', 'page_layout.box_layout')->name('box_layout');
Route::view('layout-rtl', 'page_layout.layout_rtl')->name('layout_rtl');
Route::view('layout-dark', 'page_layout.layout_dark')->name('layout_dark');
Route::view('hide-on-scroll', 'page_layout.hide_on_scroll')->name('hide_on_scroll');
Route::view('footer-light', 'page_layout.footer_light')->name('footer_light');
Route::view('footer-dark', 'page_layout.footer_dark')->name('footer_dark');
Route::view('footer-fixed', 'page_layout.footer_fixed')->name('footer_fixed');


Route::resource('photo', 'PhotoController');
Route::resource('property', 'PropertyController');
Route::resource('user', 'UserController');
Route::resource('room', 'RoomController');
Route::resource('amenity', 'AmenityController');
Route::resource('ptypes', 'PTypesController');
Route::resource('rate_property', 'Rate_PropertyController');
Route::resource('order', 'OrderController');
Route::resource('site_settings', 'Site_SettingsController');
Route::resource('chat_message', 'Chat_MessageController');
Route::resource('facility', 'FacilityController');
Route::resource('properties_facilities', 'Properties_FacilitiesController');
Route::resource('contact_us', 'Contact_UsController');
Route::resource('slider', 'SliderController');
Route::resource('notification', 'NotificationController');
Route::resource('video', 'VideoController');
Route::resource('wishlist', 'WishlistController');






