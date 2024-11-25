<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\InventoryPoductController;
use App\Http\Controllers\MonitoringController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {

//     return view('CustomerUI/base');
// });

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


// Route::middleware('prevent-back-history')->group(function () {

Route::get('/redirect', [RoomController::class, 'redirect'])->middleware(['auth', 'verified'])->name('redirect');


Route::group(['middleware' => 'custom-auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    Route::get('/panorama', [AdminController::class, 'panorama'])->name('panorama');
    Route::post('/savePanorama', [AdminController::class, 'panorama_save'])->name('savePanorama');
    Route::post('/editPanorama', [AdminController::class, 'panorama_edit'])->name('editPanorama');
    Route::post('/deletePanorama', [AdminController::class, 'panorama_delete'])->name('deletePanorama');
    Route::get('/category', [AdminController::class, 'category'])->name('category');
    Route::get('/report', [AdminController::class, 'report'])->name('report');
    Route::get('/RoomList', [AdminController::class, 'roomlist'])->name('roomlist');
    Route::get('/promo',  [AdminController::class, 'promo'])->name('promo');
    route::post('/savecategory', [AdminController::class, 'savecategory'])->name('savecategory');
    route::get('/saveroom', [AdminController::class, 'saveroom'])->name('saveroom');
    route::post('/editroom', [AdminController::class, 'editroom'])->name('editroom');
    route::post('/deleteroom', [AdminController::class, 'deleteroom'])->name('deleteroom');
    route::post('/savecategory', [AdminController::class, 'savecategory'])->name('savecategory');
    route::post('/editcategory', [AdminController::class, 'editcategory'])->name('editcategory');
    route::post('/deletecategory', [AdminController::class, 'deletecategory'])->name('deletecategory');
    route::post('/composePromo', [AdminController::class, 'composePromo'])->name('composePromo');


    // inventory
    Route::get('/inventory-Product', [InventoryController::class, 'product'])->name('inventProduct');
    Route::get('/inventory-Customer', [InventoryController::class, 'customer'])->name('inventCustomer');
    Route::get('/inventory-Category', [InventoryController::class, 'category'])->name('inventCategory');

    Route::post('/create-inventory-Category', [InventoryController::class, 'create_category'])->name('createCatInvent');
    Route::post('/update-inventory-Category', [InventoryController::class, 'update_category'])->name('editCatInvent');
    Route::post('/delete-inventory-Category', [InventoryController::class, 'delete_category'])->name('deleteCategoryInvent');
    Route::post('/saveProduct', [InventoryPoductController::class, 'addProduct'])->name('saveProduct');
    Route::post('/updateProduct', [InventoryPoductController::class, 'updateProduct'])->name('editProduct');
    Route::post('/deleteProduct', [InventoryPoductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/listproduct', [InventoryPoductController::class, 'listJson']);
    Route::get('/CategoryProduct/{category}', [InventoryPoductController::class, 'itemProd']);

    // end inventory

    // monitoring
    Route::get('/monitoring-cat', [MonitoringController::class, 'monitor_category'])->name('monitor-cat');
    Route::get('/monitoring-item', [MonitoringController::class, 'monitor_item'])->name('monitor-item');
    route::get('/item_json', [MonitoringController::class, 'customer_arrived_json']);
    route::get('/viewCustomerList/{id}', [MonitoringController::class, 'Customer_Check_in']);
    // end monitor

});

Route::post('/insert-testimony', [RoomController::class, 'testimony'])->name('testimony');

// payment API
Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('/success', [PaymentController::class, 'success'])->name('success');

// 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// customer
route::get('/', [RoomController::class, 'index'])->name('room');
route::get('/cottage', [CottageController::class, 'index'])->name('cottage');
route::get('/home', [RoomController::class, 'home'])->name('home');
route::get('/shows/{id}', [RoomController::class, 'show'])->name('users.show');
route::get('/modal/{id}', [RoomController::class, 'modal'])->name('modal');
route::get('/payment/{id}', [RoomController::class, 'payment'])->name('payment');
route::get('/reserve', [RoomController::class, 'reserve'])->name('reserve');
route::get('/customer-about', [CustomerProfileController::class, 'about'])->name('about');
route::get('/customer-profile', [CustomerProfileController::class, 'profile'])->name('profile');
route::get('/customer-transaction', [CustomerProfileController::class, 'transaction'])->name('transaction');
route::get('/customer-Booking', [CustomerProfileController::class, 'booking'])->name('booking');
route::get('/customer-notifications', [CustomerProfileController::class, 'notifications'])->name('notifications');
route::post('/time_in', [CustomerProfileController::class, 'time_in']);
route::post('/saveCheckOut', [CustomerProfileController::class, 'time_out']);
route::get('/customer-view-verify/{id}', [CustomerProfileController::class, 'verify_customer']);
route::get('/verify/{gcash_ref}', [CustomerProfileController::class, 'verify_now']);
route::get('/decline/{gcash_ref}', [CustomerProfileController::class, 'decline_now']);
// -------


// json
route::get('/json', [RoomController::class, 'json']);
route::get('/json_image', [RoomController::class, 'innerjoin']);
route::get('/category_image', [RoomController::class, 'innerjoins']);
route::get('/image', [AdminController::class, 'Image_json']);
route::get('/json_panorama', [RoomController::class, 'panorama']);
route::get('/json_category/{id}', [RoomController::class, 'json_category']);
route::get('/modaljson/{id}', [RoomController::class, 'modalitem']);
route::get('/roomjson', [RoomController::class, 'json_roomlist']);
Route::get('/customer_json', [AdminController::class, 'customer_json'])->name('customer_json');
Route::get('/category_json', [AdminController::class, 'category_json'])->name('category_json');
Route::get('/room_json', [AdminController::class, 'room_json'])->name('room_json');
route::get('/panorama_json', [AdminController::class, 'panorama_json']);
route::get('/inventCat_json', [InventoryController::class, 'inventCat_json']);
route::get('/booking_json', [CustomerProfileController::class, 'booking_json']);
route::get('/payment_json', [CustomerProfileController::class, 'payment_json']);
route::get('/testimony', [RoomController::class, 'testimony_json']);
route::get('/notifCatch', [MonitoringController::class, 'customer_notif_json']);
route::get('/promo_json', [AdminController::class, 'promo_json']);
route::get('/ratejson/{cat}/{room}', [AdminController::class, 'ratejson']);
// --

route::get('/join', [RoomController::class, 'innerjoin']);

require __DIR__ . '/auth.php';
// });
