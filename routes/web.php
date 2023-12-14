<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CheckoutController;

//--------------------------Authentication-----------------------------
//Profile
Route::get('/account', [AuthController::class, 'account'])->name('account')->middleware('auth');
//Register
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
//Login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//Log out
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
//Change password
Route::get('/change_password', [AuthController::class, 'changePasswordForm'])->middleware('auth');
Route::post('/change_password', [AuthController::class, 'changePassword']);
//Update user information
Route::post('/update_information', [AuthController::class, 'updateInfo']);
//Customer information management (Admin only)
Route::get('/customermanage', [AuthController::class, 'showCM'])->middleware('admin');
//User's account self-delete
Route::delete('/delete/{user_id}', [AuthController::class, 'deleteUser']);
//Admin delete user
Route::delete('/delete_user/{user_id}', [AuthController::class, 'deleteUserForAdmin']);

//--------------------------Cakes-----------------------------
//Show homepage
Route::get('/', [CakeController::class, 'home']);
//Show cake's menu
Route::get('/cakes/menu', [CakeController::class, 'index']);
//Show cake addition form
Route::get('/cakes/addNew/{type}', [CakeController::class, 'showAddCakeForm'])->middleware('admin');
Route::post('/cakes/add/{type}', [CakeController::class, 'addNew']);
//Show cake edition form
Route::get('/cakes/{name}/modify', [CakeController::class, 'modifyForm'])->middleware('admin');
Route::put('/cakes/modify/{name}', [CakeController::class, 'modify']);
//Delete a cake
Route::delete('/cakes/delete/{name}', [CakeController::class, 'deleteCake']);
//Show cart
Route::get('/cart', [OrderController::class, 'showCart'])->middleware('auth');


//-------------------------Order----------------------------
//Show all customers' orders
Route::get('/ordermanage', [OrderController::class, 'orderManagement'])->middleware('admin');
//Customers check their order
Route::get('/myorder', [OrderController::class, 'customerOrder'])->middleware('auth');
//Admin check customer's order detail
Route::get('/orderdetail/user/{uid}', [OrderController::class, 'orderDetailForAdmin'])->middleware('admin');
//Add a cake to cart
Route::post('/cart/add', [OrderController::class, 'addToCart']);
//Delete a cake from cart
Route::delete('/cart/deleteCakeCart', [OrderController::class, 'deleteFromCart']);
//Decrease number of cakes
Route::patch('/cart/decrease', [OrderController::class, 'decreaseCake']);
//Increase number of cakes
Route::patch('/cart/increase', [OrderController::class, 'increaseCake']);

//-------------------------Voucher----------------------------
//Apply voucher to discount
Route::post('/voucher/apply', [VoucherController::class, 'applyVoucher']);
//Show add voucher form 
Route::get('/voucher/add', [VoucherController::class, 'addVoucherForm'])->middleware('admin');
//Store voucher
Route::post('/voucher/store', [VoucherController::class, 'storeVoucher']);
//Show revenue report
Route::get('/revenue', [OrderController::class, 'showRevenue'])->middleware('admin');
Route::post('/getRevenue', [OrderController::class, 'getRevenue']);
//-------------------------Payment----------------------------
Route::post('/VNPay_Payment', [CheckoutController::class, 'Payment'])->middleware('auth');


Route::get('/aboutus', function () {
    return view('cakes.aboutUs');
});

Route::get('/actipolicy', function () {
    return view('cakes.actiPolicy');
});

Route::get('/securitypolicy', function () {
    return view('cakes.securityPolicy');
});

route::get('/test', function () {
    return view('cakes.test');
});