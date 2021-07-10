<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyersAuthController;
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

Route::middleware(['guest'])->group(function () {
    
    Route::get('register', [BuyersAuthController::class,'showRegister']);
    Route::post('register', [BuyersAuthController::class,'register']);

    Route::get('login', [BuyersAuthController::class,'showLogin']);
    Route::post('login', [BuyersAuthController::class,'login']);
});

Route::middleware(['auth'])->group(function () {

    

});