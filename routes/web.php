<?php

use App\Http\Controllers\CashFlowTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KonfirmasiPembayaranController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('cash-flow-types', CashFlowTypeController::class);
    Route::resource('payment-types', PaymentTypeController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::resource('konfirmasi-pembayaran', KonfirmasiPembayaranController::class);

// Route::get('/konfirmasi-pembayaran', [App\Http\Controllers\KonfirmasiPembayaranController::class, 'index'])->name('konfirmasi-pembayaran');
