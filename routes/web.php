<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersAuthController;
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


Route::get('products', [ProductsController::class,'showProducts']);

Route::middleware(['guest'])->group(function () {
    
    Route::get('auth', [BuyersAuthController::class,'showRegister']);
    Route::post('auth', [BuyersAuthController::class,'register']);
});


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [BuyersAuthController::class,'showDashboard']);

});

Route::middleware(['whitelist'])->group(function () {
    
    Route::get('workerLogin', [WorkersController::class,'showWorkersLogin']);
    Route::post('workerLogin', [WorkersController::class, 'workersLogin']);
});