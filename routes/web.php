<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\usercontroller;
use App\Http\controllers\userscontroller;
use App\Http\controllers\categorycontroller;
use App\Http\controllers\couponcontroller;
use App\Http\controllers\product_manange_controller;
use App\Http\controllers\product_image_controller;
use App\Http\controllers\product_category_controller;
use App\Http\controllers\product_attribute_controller;
use App\Http\controllers\banner_controller;
use App\Http\controllers\Api\orderdetail_controller;
use App\Http\controllers\cms_controller;
use App\Http\controllers\contact_controller;
use App\Http\controllers\show_controller;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminpanel', function () {
    return view('admin.dashboard');
});
/**user management */

Route::resource('users', userscontroller::class);


/**product Management */

Route::resource('product_manage', product_manange_controller::class);

/**product image */

Route::resource('product_image', product_image_controller::class);

/**product category */
Route::resource('product_category',product_category_controller::class);

/**category Management */

Route::resource('category', categorycontroller::class);

/**product attribute */
Route::resource('product_attribute', product_attribute_controller::class);


/**Banner Management */
Route::resource('banner',banner_controller::class);


/** coupon Management */

Route::resource('coupon', couponcontroller::class);
Route::get("/inactive-coupon",[couponcontroller::class,"couponInactive"]);

/**product management */
 Route::get("/user/product_manage",[usercontroller::class,"pro_manage"]);
 Route::post("/user/postproduct_manage",[usercontroller::class,"postpro_manage"]);

/**order manage */
Route::resource('ordermanage', orderdetail_controller::class);

/**cms controller */
Route::resource('cms',cms_controller::class);

/**contact  */
Route::resource('contact',contact_controller::class);

/**admin configuration */
Route::resource('configuration',show_controller::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.admin_home')->middleware('is_admin');
