<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\WorkersController;
use App\Models\Products;

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

//Route::get('products', [ProductsController::class,'showProductsPage']);
Route::get('products/csempe', [ProductsController::class,'showProducts']);
Route::get('products/parketta', [ProductsController::class,'showProducts']);
Route::get('products/parketta/{name}/{color}', [ProductsController::class,'showUniqueProducts']);
Route::get('products/csempe/{name}/{color}', [ProductsController::class,'showUniqueProducts']);

Route::post('products/csempe/{name}/{color}', [ProductsController::class,'saveToCart']);
Route::post('products/parketta/{name}/{color}', [ProductsController::class,'saveToCart']);


Route::get('auth', [WorkersController::class,'showRegister']);
Route::post('auth', [WorkersController::class,'register']);

Route::get('forgotpassword', [WorkersController::class,'passwordReminderShow']);
Route::post('forgotpassword', [WorkersController::class,'passwordReminderSend']);

Route::get('dashboard', [DashboardController::class,'showDashboard'])->middleware('authCustom');
Route::get('logout', [WorkersController::class,
'logout'])->middleware('authCustom');

Route::get('dashboard/prevorders', [ProductsController::class,'getPreviousOrders'])->middleware('authCustom');;
Route::get('dashboard/prevorders/{orderId}', [ProductsController::class,'getPreviousOrderItems'])->middleware('authCustom');;


Route::middleware(['whitelist'])->group(function () {

    Route::get('workerLogin', [WorkersController::class,'showWorkersLogin']);
    Route::post('workerLogin', [WorkersController::class, 'workersLogin']);
});

Route::get('technicians', [TechnicianController::class,'showTechnicians']);

///---------------ADMIN---------------///
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard/admin', [AdminController::class,'getAdminPage']);

    Route::get('dashboard/admin/delete/employee/{employees}', [AdminController::class,'deleteEmployee']);

    Route::post('dashboard/admin/update/employee/{employees}', [AdminController::class,'updateEmployee']);
    Route::get('dashboard/admin/update/employee/{employees}', [AdminController::class,'getEmployeeUpdate']);

    Route::get('dashboard/admin/create/employee', [AdminController::class,'getEmployeeCreate']);
    Route::post('dashboard/admin/create/employee', [AdminController::class,'createEmployee']);

    Route::get('dashboard/admin/delete/buyer/{buyers}', [AdminController::class,'deleteBuyer']);

    Route::get('dashboard/admin/update/buyer/{buyers}', [AdminController::class,'getBuyerUpdate']);
    Route::post('dashboard/admin/update/buyer/{buyers}', [AdminController::class,'updateBuyer']);

    Route::get('dashboard/admin/create/buyer', [AdminController::class,'getBuyerCreate']);
    Route::post('dashboard/admin/create/buyer', [AdminController::class,'createBuyer']);
});


///---------------Employees---------------///
Route::middleware(['isEmployee'])->group(function () {
    Route::get('dashboard/worker', [EmployeeController::class,'getDashboard']);
    Route::get('dashboard/worker/stats', [EmployeeController::class,'showProductsCount']);
    Route::get('dashboard/worker/stats/download', [EmployeeController::class,'downloadStats']);
    Route::get('dashboard/worker/order', [EmployeeController::class,'getOrders']);

    Route::post('dashboard/worker/order', [EmployeeController::class,'saveOrders']);
});

///---------------CART---------------///

Route::get('cart', [CartController::class,'getUniqueProducts']);

Route::post('cart', [CartController::class,'orderUniqueProducts']);
Route::get('cart/remove/{id}', [CartController::class,'removeProduct']);
Route::get('cart/add/{id}', [CartController::class,'updateProductQuantity']);
Route::get('cart/minus/{id}', [CartController::class,'minusProductQuantity']);
