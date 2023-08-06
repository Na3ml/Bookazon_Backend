<?php

use App\Http\Controllers\Admin\PropertyOwnerController;
use App\Http\Controllers\Admin\BookerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Property_TypeController;

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
    //Property type controller
    Route::resource('propertytype', Property_TypeController::class);
});


require __DIR__.'/auth.php';
