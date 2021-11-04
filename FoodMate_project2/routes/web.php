<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;


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

/*
 * FRONT ROUTES
 * */
Route::group(['middleware' => ['user.or.guest']], function () {
//    index route
    Route::get('/', [Front\HomeController::class, 'index'])->name('showIndex');
    Route::get('/how-it-work', [Front\HowItWorkController::class, 'howItWork']);
    Route::get('/shop', [Front\HomeController::class, 'showShop']);
    Route::get('/search-not-found', [Front\HomeController::class, 'searchNotFound']);
    Route::post('/product-search', [Front\HomeController::class, 'search']);
    Route::get('/about-us', [Front\HomeController::class, 'showAboutUs']);
    Route::get('/contact-us', [Front\HomeController::class,'showContact']);
    Route::post('/contact-us', [Front\HomeController::class, 'getMessage']);

// product routes
    Route::get('/product-detail/{productId}', [Front\ProductController::class, 'showDetail']);
    Route::post('/product-review', [Front\ProductController::class, 'review'])->middleware('auth');
    Route::post('/shop', [Front\HomeController::class, 'filterProducts']);
    Route::get('/shop/{cateId}', [Front\HomeController::class, 'showCategory']);
    Route::post('/shop/{cateId}', [Front\HomeController::class, 'filterCategory']);
    Route::get('/shop-featured', [Front\HomeController::class, 'showFeature']);
// restaurant routes
    Route::get('/restaurant-detail/{id}', [Front\RestaurantDetailController::class, 'restaurantDetail']);
    Route::post('/restaurant-review', [Front\RestaurantDetailController::class, 'review'])->middleware('auth');
    Route::get('/restaurants', [Front\RestaurantController::class, 'show']);
    Route::get('/restaurants/{categoryId}', [Front\RestaurantController::class, 'showCategory']);
    Route::post('/restaurant-search', [Front\RestaurantController::class, 'searchRestaurant']);
    Route::get('/restaurant-not-found', [Front\RestaurantController::class, 'showNotFound']);
    Route::get('/restaurants/{cateId}', [Front\RestaurantController::class, 'category']);

//register restaurant
    Route::group(['middleware' => ['auth']], function () {
        Route::post('/register-reservation/add', [Front\RegisterReservationController::class, 'add']);
        Route::get('/register-reservation/{userId}', [Front\RegisterReservationController::class, 'registerReservation']);
        Route::post('/register-reservation/package', [Front\RegisterReservationController::class, 'package']);
    });
//  login & register routes
    Route::get('/login', function () {
        if (Auth::check()){
            return back();
        }
        return view('front.auth.login');
    })->name('login');
    Route::get('/register', function () {
        $login = null;
        return view('front.auth.register', compact('login'));
    });
    Route::post('/login', [Front\HomeController::class, 'login']);
    Route::post('/register', [Front\HomeController::class, 'register']);

// user dashboard routes
    Route::prefix('/dashboard')->group(function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/setting', [Front\HomeController::class, 'showAccountSetting']);
            Route::post('/setting/update-profile', [Front\HomeController::class, 'updateProfile']);
            Route::get('/cart', [Front\CartController::class, 'show']);
            Route::get('/orders', [Front\OrderController::class, 'showOrderList'])->name('orderList');
        });
    });
// cart
    Route::prefix('/cart')->group(function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/add/{userId}/{productId}', [Front\CartController::class, 'add']);
            Route::get('/add', [Front\CartController::class, 'addIndex']);
            Route::get('/delete/{userId}/{productId}', [Front\CartController::class, 'delete']);
            Route::get('/destroy/{userId}/{restaurantId}', [Front\CartController::class, 'destroy']);
            Route::get('/update', [Front\CartController::class, 'update']);
            Route::get('/updateNum', [Front\CartController::class, 'updateNum']);
            Route::get('/add-from-detail', [Front\CartController::class,'addFromDetail'])->middleware('auth');
        });
    });
// Order routes
    Route::prefix('/order')->group(function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/place-order/{userId}/{restaurantId}', [Front\OrderController::class, 'show']);
            Route::post('/place-order', [Front\OrderController::class, 'placeOrder']);
            Route::get('/order-detail/{orderId}', [Front\OrderController::class, 'orderDetail']);
            Route::post('/cancel', [Front\OrderController::class, 'cancelOrder']);
            Route::get('/filter-order-status', [Front\OrderController::class, 'statusFilter']);
        });
    });
});
//logout
Route::get('/logout', [Front\HomeController::class, 'logout']);
Route::get('/registerRestaurantMail', function (){
   return view('front.components.activeRestaurantMail');
});
/*
 * ADMIN ROUTES
 * */
Route::group(['middleware' => ['admin']], function () {
// index route
    Route::get('/admin-dashboard/{type}', [Admin\HomeController::class, 'show']);
    Route::get('/admin-earning', [Admin\HomeController::class, 'showEarning']);
    Route::get('/admin-earning/filter-by-date', [Admin\HomeController::class, 'earningFilter']);


//Order routes
    Route::get('/admin-order', [Admin\OrderController::class, 'showOrders']);
    Route::get('/admin-order/{id}', [Admin\OrderController::class, 'orderDetail']);
    Route::get('/order-start-delivery/{orderId}', [Admin\OrderController::class, 'startDelivery']);
    Route::post('/admin-order/mark-order-delivered', [Admin\OrderController::class, 'markDelivered']);
    Route::post('/admin-order/accept', [Admin\OrderController::class, 'acceptOrder']);
    Route::post('/admin-order/reject', [Admin\OrderController::class, 'rejectOrder']);
    Route::get('/order/filter-by-status', [Admin\OrderController::class, 'statusFilter']);

// Product routes
    Route::get('/admin-product', [Admin\ProductController::class, 'showProducts']);
    Route::get('/admin-product-edit/{id}', [Admin\ProductController::class, 'productEditShow']);
    Route::get('/admin-add-product', [Admin\ProductController::class, 'showAdd']);
    Route::get('/admin-delete-product/{productId}', [Admin\ProductController::class, 'deleteProduct']);
    Route::get('/admin-product-edit/images/delete/{productImageId}', [Admin\ProductController::class, 'deleteImage']);
    Route::post('/admin-product-edit/images', [Admin\ProductController::class, 'editImages']);
    Route::post('/admin-product-edit/info', [Admin\ProductController::class, 'editInfo']);
    Route::post('/admin-add-product', [Admin\ProductController::class, 'addProduct']);
    Route::post('/admin-product-search', [Admin\ProductController::class, 'searchProductResult']);

//Restaurant routes
    Route::get('/admin-restaurant', [Admin\RestaurantController::class, 'showRestaurantInfo']);
    Route::get('/admin-restaurant/edit-images/delete/{RestaurantImageId}', [Admin\RestaurantController::class, 'deleteImage']);
    Route::post('/admin-restaurant/edit-avatar', [Admin\RestaurantController::class, 'editAvatar']);
    Route::post('/admin-restaurant/edit-images', [Admin\RestaurantController::class, 'editImages']);
    Route::post('/admin-restaurant/edit-info', [Admin\RestaurantController::class, 'editInfo']);

//Mail routes
    Route::get('/mail', [Admin\RestaurantController::class, 'showMail']);


});
/*
 * MANAGEMENT ROUTES
 * */

Route::group(['middleware' => ['root']], function () {
    Route::get('/management-dashboard', [Admin\ManagementController::class, 'showRestaurants'])->name('showManagement');
    Route::get('/management-restaurants', [Admin\ManagementController::class, 'showRestaurants']);
    Route::get('/management-restaurant-detail/{id}', [Admin\ManagementController::class, 'showDetail']);
    Route::get('/management-restaurant-detail/download/{file}/{id}', [Admin\ManagementController::class, 'download']);
    Route::get('/management-restaurant-detail/delete/{id}', [Admin\ManagementController::class, 'delete']);
    Route::get('/management-restaurant-detail/status/{id}/{status}', [Admin\ManagementController::class,'updateStatus']);
    Route::get('/management-restaurant-detail/stop/{id}', [Admin\ManagementController::class,'stopRestaurant']);
    Route::post('/management-restaurant-search', [Admin\ManagementController::class,'searchRestaurantResult']);

});

