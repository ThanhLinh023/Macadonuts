<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CakeController;

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


//--------------------------Cakes-----------------------------
//Show homepage
Route::get('/', [CakeController::class, 'home']);
//Show single cake
Route::get('/cakes/{name}', [CakeController::class, 'show']);
//Show cake addition form
Route::get('/cakes/add', [CakeController::class, 'add'])->middleware('auth');
//Show cake edition form
Route::get('/cakes/{name}/edit', [CakeController::class, 'edit'])->middleware('auth');
//Show cake's menu
Route::get('/menu', [CakeController::class, 'index']);

Route::get('/test', function () {
    return view('cakes.cart');
});