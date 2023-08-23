<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\SocialAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
    Route::post('/check-token', [ResetPasswordController::class, 'checkToken']);
    Route::post('/update-password', [ResetPasswordController::class, 'updatePassword']);

//    Route::get('/properties', [AuthController::class, 'userProfile']);
});

Route::group([],function(){
   Route::get('/properties',[PropertyController::class,'index']);
   Route::get('/properties/{id}',[PropertyController::class,'show']);
});

Route::group([],function(){
   Route::post('/home/search',[HomeController::class,'newSearch']);
   Route::get('/login/{provider}', [SocialAuth::class,'redirectToProvider']);
    Route::get('/login/{provider}/callback', [SocialAuth::class,'handleProviderCallback'])->name('auth.socialite.callback');
});
