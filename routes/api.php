<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\couponcontroller;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Api\Banner_controller;
use App\Http\Controllers\Api\Product_image_controller;
use App\Http\Controllers\Api\Categorycontroller;
use App\Http\Controllers\Api\Product_manange_controller;
use App\Http\Controllers\Api\wish_controller;
use App\Http\Controllers\Api\userdetail_controller;
use App\Http\Controllers\Api\orderdetail_controller;
use App\Http\Controllers\Api\coupon_controller;
use App\Http\Controllers\Api\config_controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api'],function($router){
    Route::post('/register',[JWTController::class,'register']);

    Route::post('/login',[JWTController::class,'login']);
    Route::post('/contact',[JWTController::class,'contact']);
    Route::get('/profile',[JWTController::class,'profile']);
    Route::post('/updateprofile',[JWTController::class,'updateProfile']);
    Route::post('/changepass',[JwtController::class,'changePassword']);

    Route::post('/logout',[JWTController::class,'logout']);

    Route::get('cms',[JwtController::class,'cms']);
    Route::get('cms/{id}',[JwtController::class,'cmsById']);    

});

Route::get('/test',[Banner_controller::class,'index']);
Route::get('/product_image',[Product_image_controller::class,'index']);
Route::get('/category',[Categorycontroller::class,'index']);
Route::get('/product',[Product_manange_controller::class,'index']);

Route::get('/product_detail/{id}',[Product_image_controller::class,'show']);

Route::get('/product/{id}',[Product_manange_controller::class,'show']);

Route::get('/products/{id}',[Categorycontroller::class,'show']);

Route::resource('/wish',wish_controller::class);
Route::resource('/userdetail',userdetail_controller::class);
Route::resource('/orderdetail',orderdetail_controller::class);

Route::resource('/coupon',coupon_controller::class);
Route::resource('/config',config_controller::class);

Route::resource('/News',NewsController::class);

