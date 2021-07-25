<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WorkersController;

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
    return view('index');
});


Route::get('products', [ProductsController::class,'showProductsPage']);
Route::get('products/csempe', [ProductsController::class,'showProducts']);
Route::get('products/parketta', [ProductsController::class,'showProducts']);

Route::get('auth', [WorkersController::class,'showRegister']);
Route::post('auth', [WorkersController::class,'register']);

Route::get('forgotpassword', [WorkersController::class,'passwordReminderShow']);
Route::post('forgotpassword', [WorkersController::class,'passwordReminderSend']);

Route::get('dashboard', [DashboardController::class,'showDashboard'])->middleware('authCustom');
Route::get('logout', [WorkersController::class,'logout'])->middleware('authCustom');

Route::middleware(['whitelist'])->group(function () {
    
    Route::get('workerLogin', [WorkersController::class,'showWorkersLogin']);
    Route::post('workerLogin', [WorkersController::class, 'workersLogin']);
});