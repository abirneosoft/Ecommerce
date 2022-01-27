<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\usercontroller;
use App\Http\controllers\userscontroller;
use App\Http\controllers\CategoryController;
use App\Http\controllers\CouponController;
use App\Http\controllers\product_manange_controller;
use App\Http\controllers\ProductImageController;
use App\Http\controllers\ProductCategoryController;
use App\Http\controllers\ProductAttributeController;
use App\Http\controllers\BannerController;
use App\Http\controllers\Api\orderdetail_controller;
use App\Http\controllers\CmsController;
use App\Http\controllers\ContactController;
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

Route::resource('product_image', ProductImageController::class);

/**product category */
Route::resource('product_category',ProductCategoryController::class);

/**category Management */

Route::resource('category', CategoryController::class);

/**product attribute */
Route::resource('product_attribute', ProductAttributeController::class);


/**Banner Management */
Route::resource('banner',BannerController::class);


/** coupon Management */

Route::resource('coupon', CouponController::class);
Route::get("/inactive-coupon",[CouponController::class,"couponInactive"]);

/**product management */
 Route::get("/user/product_manage",[usercontroller::class,"pro_manage"]);
 Route::post("/user/postproduct_manage",[usercontroller::class,"postpro_manage"]);

/**order manage */
Route::resource('ordermanage', orderdetail_controller::class);

/**cms controller */
Route::resource('cms',CmsController::class);

/**contact  */
Route::resource('contact',ContactController::class);

/**admin configuration */
Route::resource('configuration',show_controller::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.admin_home')->middleware('is_admin');
