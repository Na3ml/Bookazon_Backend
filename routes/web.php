<?php

use App\Http\Controllers\Admin\PropertyOwnerController;
use App\Http\Controllers\Admin\BookerController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Property_TypeController;
use App\Http\Controllers\Admin\AminityController;
use App\Http\Controllers\Admin\DropdownController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return route('dashboard');
});

Route::prefix('admin/dashboard')->middleware('auth:admin')->group(function () {
    Route::view('/', 'dashboards.default_dashboard')->name('dashboard');
    Route::resource('admin',UserController::class);
    Route::resource('propertyowner',PropertyOwnerController::class);
    Route::resource('booker',BookerController::class);
    Route::resource('{owner}/property',PropertyController::class);
    //Property type controller
    Route::resource('propertytype', Property_TypeController::class);
    Route::resource('aminities', AminityController::class);
    Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
    Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);

});


require __DIR__.'/auth.php';
