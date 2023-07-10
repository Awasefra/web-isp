<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UpdatePasswordController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'role:0'], function () {
        Route::resource('/paket', PaketController::class);
        Route::get('/paket', [PaketController::class, 'index'])->name('paket');
        Route::resource('/sales', SalesController::class);
        Route::get('/sales', [SalesController::class, 'index'])->name('sales');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/cetak_pdf_total', [LaporanController::class, 'cetak_pdf_total']);
        Route::get('/laporan/cetak_pdf_sales', [LaporanController::class, 'cetak_pdf_sales']);




    });
    Route::group(['middleware' => 'role:1'], function () {
        Route::resource('/customer', CustomerController::class);
        Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
        Route::post('/tambah_foto', [CustomerController::class, 'insert_foto'])->name('insert-foto');
        Route::put('customer',[CustomerController::class, 'update'])->name('customer-update');
        Route::resource('/password_update', UpdatePasswordController::class);
        Route::put('password_update/update', [UpdatePasswordController::class, 'update'])->name('password-update');
        // Route::resource('/sales', SalesController::class);
        // Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    });
});
