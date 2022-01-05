<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\CashFlowTypeController;
use App\Http\Controllers\CustomeJerseyController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\DashboardController;
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
    Route::resource('cash-flows', CashFlowController::class);
    Route::resource('payment-types', PaymentTypeController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('data-bahan', BahanController::class);
    Route::resource('data-jenis', JenisController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
});

Route::resource('konfirmasi-pembayaran', KonfirmasiPembayaranController::class);
Route::resource('custome-jersey', CustomeJerseyController::class);


